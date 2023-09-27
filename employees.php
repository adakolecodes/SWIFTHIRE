<?php
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: admin-login.php");
    exit();
}

//Link your database-connect file
require "config/database-connect.php";

$sql = "SELECT * FROM employees";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Page</title>
    <link rel="stylesheet" href="STYLE/bootstrap.min.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container mt-5 mb-5">
        <a href="dashboard-admin.php" class="btn btn-primary">Back to dashboard</a>
        <h1>EMPLOYEES</h1>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['first_name']; ?></td>
                        <td><?php echo $employee['last_name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><a href="employee-details.php?id=<?php echo $employee['id']; ?>" class="btn btn-primary">View</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
