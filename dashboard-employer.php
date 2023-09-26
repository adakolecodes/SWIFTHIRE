<?php
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

//Link your database-connect file
require "config/database-connect.php";

$employerId = $_SESSION['id'];
$employerEmail = $_SESSION['email_address'];

$sql = "SELECT * FROM employers_work_specification WHERE employer_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$employerId]);
$workSpecs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
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
            <h1>Welcome</h1>
            <div class="user-info">
                <img src="profile_image.jpg" alt="Profile Image"> <!-- Replace with dynamic image URL -->
                <p><strong>Employer ID:</strong> <?php echo $employerId; ?></p>
                <p><strong>Employer Email:</strong> <?php echo $employerEmail; ?></p>
            </div>
        </div>

        <div class="actions mb-5">
            <a href="employer-profile.php" class="btn btn-primary">Personal Information Form</a>
            <a href="employer-workspec.php" class="btn btn-primary">Job Application Form</a>
            <a href="process/logout.php" class="btn btn-danger">Log Out</a>
        </div>

        <div>
            <div>
                <h1>Matching Employees</h1>
            </div>
            <div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Remuneration Period</th>
                            <th>Remuneration Amount</th>
                            <th>Accomodation</th>
                            <th>Status</th>
                            <th>Employed</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through workSpecs using foreach loop -->
                        <?php foreach($workSpecs as $workSpec): 
                            if($workSpec['status'] == 0){
                                $taken = "No";
                            }else{
                                $taken = "Yes";
                            }
                            ?>
                            <tr>
                                <td><?php echo $workSpec['job']; ?></td>
                                <td><?php echo $workSpec['renumeration_period']; ?></td>
                                <td><?php echo $workSpec['renumeration_amount']; ?></td>
                                <td><?php echo $workSpec['accommodation']; ?></td>
                                <td><?php echo $workSpec['status']; ?></td>
                                <td><?php echo $taken; ?></td>
                                <td><a href="employer-view.php?id=<?php echo $workSpec['id']; ?>" class="btn btn-primary">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>