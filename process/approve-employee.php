<?php
if((isset($_GET['id']))){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    $id = $_GET['id'];
    $workSpecId = $_GET['workSpecId'];

    $sql = "UPDATE employees_work_specification SET status = 'Approved' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$workSpecId]);

    $_SESSION['success'] = "Employee approved successfully";
    header("Location: ../employee-details.php?id=$id");

}