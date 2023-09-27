<?php
if((isset($_GET['id']))){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    $id = $_GET['id'];
    $workSpecId = $_GET['workSpecId'];

    $sql = "UPDATE employers_work_specification SET status = 'Disapproved' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$workSpecId]);

    $_SESSION['success'] = "Employer disapproved successfully";
    header("Location: ../employer-details.php?id=$id");

}