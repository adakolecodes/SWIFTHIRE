<?php
if((isset($_GET['workSpecId']))){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    $workSpecId = $_GET['workSpecId'];

    $sql = "UPDATE employees_work_specification SET taken = 1 WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$workSpecId]);

    $_SESSION['success'] = "Employee Hired Successfully";
    header("Location: ../dashboard-employer.php");

}