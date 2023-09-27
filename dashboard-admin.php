<?php
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: admin-login.php");
    exit();
}

//Link your database-connect file
require "config/database-connect.php";

$adminId = $_SESSION['id'];
$adminEmail = $_SESSION['email_address'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="STYLE/dashboard1.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>
            <!-- Show success or error message -->
            <?php 
                if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger">
                        <p><strong>Error:</strong> <?php echo $_SESSION['error']; ?></p>
                    </div>
                <?php }elseif(isset($_SESSION['success'])){?>
                    <div class="alert alert-success">
                        <p><strong>Success:</strong> <?php echo $_SESSION['success']; ?></p>
                    </div>
                <?php }
                unset($_SESSION['error']);
                unset($_SESSION['success']);
            ?>
        </div>
        <div class="header">
            <h1>Welcome Admin</h1>
            <div class="user-info">
                <p><strong>Admin ID:</strong> <?php echo $adminId; ?></p>
                <p><strong>Admin Email:</strong> <?php echo $adminEmail; ?></p>
            </div>
        </div>

        <div class="actions mb-5">
            <a href="employers.php" class="btn btn-primary">View Employers</a>
            <a href="employees.php" class="btn btn-primary">View Employees</a>
            <a href="process/logout-admin.php" class="btn btn-danger">Log Out</a>
        </div>
    </div>
</body>
</html>