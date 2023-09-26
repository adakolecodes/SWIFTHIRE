<?php
if(isset($_POST['employee'])){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $middle_name = filter_input(INPUT_POST, 'middle_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date_of_birth = filter_input(INPUT_POST, 'date_of_birth', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $marital_status = filter_input(INPUT_POST, 'marital_status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age_group = filter_input(INPUT_POST, 'age_group', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $whatsapp_no = filter_input(INPUT_POST, 'whatsapp_no', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone_no = filter_input(INPUT_POST, 'phone_no', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $highest_qualification = filter_input(INPUT_POST, 'highest_qualification', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $residential_address = filter_input(INPUT_POST, 'residential_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $nin_upload = filter_input(INPUT_POST, 'nin_upload', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $proof_of_highest_qualification = filter_input(INPUT_POST, 'proof_of_highest_qualification', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $passport_photograph = filter_input(INPUT_POST, 'passport_photograph', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_full_name = filter_input(INPUT_POST, 'referee_full_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_residential_address = filter_input(INPUT_POST, 'referee_residential_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_work_address = filter_input(INPUT_POST, 'referee_work_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_email_address = filter_input(INPUT_POST, 'referee_email_address', FILTER_SANITIZE_EMAIL);
    $referee_phone_no = filter_input(INPUT_POST, 'referee_phone_no', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Define an SQL INSERT statement with placeholders.
    $sql = "INSERT INTO employees (
        first_name, 
        middle_name, 
        last_name,
        date_of_birth, 
        marital_status, 
        gender, 
        age_group, 
        whatsapp_no, 
        phone_no,
        email, 
        highest_qualification, 
        residential_address,
        -- nin_upload, 
        -- proof_of_highest_qualification, 
        -- passport_photograph, 
        referee_full_name, 
        referee_residential_address, 
        referee_work_address, 
        referee_email_address, 
        referee_phone_no
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";// , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? //, ?, ?, ?

    // Prepare the SQL statement.
    $stmt = $pdo->prepare($sql);

    // Bind values to the placeholders and execute the statement.
    $stmt->execute([
        $first_name, 
        $middle_name, 
        $last_name,
        $date_of_birth, 
        $marital_status, 
        $gender, 
        $age_group, 
        $whatsapp_no, 
        $phone_no,
        $email, 
        $highest_qualification, 
        $residential_address,
        // $nin_upload, 
        // $proof_of_highest_qualification, 
        // $passport_photograph, 
        $referee_full_name, 
        $referee_residential_address, 
        $referee_work_address, 
        $referee_email_address, 
        $referee_phone_no
    ]);

    // Check if the INSERT was successful.
    if ($stmt->rowCount() > 0) {
        $_SESSION['success'] = "Profile information set successfully";
        header("Location: ../dashboard-employee.php");
    } else {
        $_SESSION['error'] = "Could not process profile information";
        header("Location: ../employee-profile.php");
    }


}