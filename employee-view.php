<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: admin-login.php");
    exit();
}

//Link your database-connect file
require "config/database-connect.php";

if (!isset($_GET['employeeId'])) {
    header("Location: dashboard-employer.php");
    exit();
}

$employerId = $_SESSION['id'];

$employeeId = $_GET['employeeId'];
$workSpecId = $_GET['workSpecId'];

$sql = "SELECT * FROM employees WHERE employee_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$employeeId]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);
$userId = $employee['employee_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <a href="dashboard-employer.php" class="btn btn-primary">Back</a>
        <div>
            <h1><?php echo $employee['first_name'] . " " . $employee['last_name']; ?></h1>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $employee['first_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Middle Name</th>
                        <td><?php echo $employee['middle_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $employee['last_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $employee['date_of_birth']; ?></td>
                    </tr>
                    <tr>
                        <th>Marital Status</th>
                        <td><?php echo $employee['marital_status']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $employee['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Age Group</th>
                        <td><?php echo $employee['age_group']; ?></td>
                    </tr>
                    <tr>
                        <th>WhatsApp Number</th>
                        <td><?php echo $employee['whatsapp_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo $employee['phone_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $employee['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Highest Qualification</th>
                        <td><?php echo $employee['highest_qualification']; ?></td>
                    </tr>
                    <tr>
                        <th>Residential Address</th>
                        <td><?php echo $employee['residential_address']; ?></td>
                    </tr>
                    <tr>
                        <th>NIN Upload</th>
                        <td><a href="uploads/<?php echo $employee['nin_upload']; ?>" target="_blank">View</a></td>
                    </tr>
                    <tr>
                        <th>Proof of Highest Qualification</th>
                        <td><a href="uploads/<?php echo $employee['proof_of_highest_qualification']; ?>" target="_blank">View</a></td>
                    </tr>
                    <tr>
                        <th>Passport Photograph</th>
                        <td><a href="uploads/<?php echo $employee['passport_photograph']; ?>" target="_blank">View</a></td>
                    </tr>
                    <tr>
                        <th>Referee Full Name</th>
                        <td><?php echo $employee['referee_full_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Residential Address</th>
                        <td><?php echo $employee['referee_residential_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Work Address</th>
                        <td><?php echo $employee['referee_work_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Email Address</th>
                        <td><?php echo $employee['referee_email_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Phone Number</th>
                        <td><?php echo $employee['referee_phone_no']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>After you have contacted the employee, and discussed and he/she is interested, come back and click on the button below to finish the process</p>
            <a href="process/hire-employee.php?workSpecId=<?php echo $workSpecId; ?>" class="btn btn-primary">Hire Employee</a>
        </div>
    </div>
</body>

</html>