<?php
if(isset($_POST['employer_work_spec'])){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";



$employer_id = filter_input(INPUT_POST, 'employer_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$job = filter_input(INPUT_POST, 'job', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$renumeration_period = filter_input(INPUT_POST, 'renumeration_period', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$renumeration_amount = filter_input(INPUT_POST, 'renumeration_amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$accommodation = filter_input(INPUT_POST, 'accommodation', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


// Define the SQL INSERT statement with placeholders.
$sql = "INSERT INTO employers_work_specification (
    employer_id, 
    job, 
    renumeration_period, 
    renumeration_amount, 
    accommodation, 
    status
) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the SQL statement.
$stmt = $pdo->prepare($sql);

// Bind values to the placeholders and execute the statement.
$stmt->execute([
    $employer_id,
    $job,
    $renumeration_period,
    $renumeration_amount,
    $accommodation,
    $status
]);

// Check if the INSERT was successful.
if ($stmt->rowCount() > 0) {
    $_SESSION['success'] = "Profile information set successfully";
    header("Location: ../dashboard-employer.php");
} else {
    $_SESSION['error'] = "Could not process profile information";
    header("Location: ../employer-workspec.php");
}


}