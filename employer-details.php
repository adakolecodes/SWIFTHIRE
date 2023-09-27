<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: admin-login.php");
    exit();
}

//Link your database-connect file
require "config/database-connect.php";

if (!isset($_GET['id'])) {
    header("Location: employers.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM employers WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$employer = $stmt->fetch(PDO::FETCH_ASSOC);
$userId = $employer['employer_id'];

$sql = "SELECT * FROM employers_work_specification WHERE employer_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$workSpecs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Details</title>
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <a href="employers.php" class="btn btn-primary">Back</a>
        <div>
            <!-- Show success or error message -->
            <?php
            if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <p><strong>Error:</strong> <?php echo $_SESSION['error']; ?></p>
                </div>
            <?php } elseif (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success">
                    <p><strong>Success:</strong> <?php echo $_SESSION['success']; ?></p>
                </div>
            <?php }
            unset($_SESSION['error']);
            unset($_SESSION['success']);
            ?>
        </div>
        <div>
            <h1><?php echo $employer['first_name'] . " " . $employer['last_name']; ?></h1>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Title</th>
                        <td><?php echo $employer['title']; ?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $employer['first_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Middle Name</th>
                        <td><?php echo $employer['middle_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $employer['last_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $employer['date_of_birth']; ?></td>
                    </tr>
                    <tr>
                        <th>Marital Status</th>
                        <td><?php echo $employer['marital_status']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $employer['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Age Group</th>
                        <td><?php echo $employer['age_group']; ?></td>
                    </tr>
                    <tr>
                        <th>WhatsApp Number</th>
                        <td><?php echo $employer['whatsapp_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo $employer['phone_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $employer['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Residential Address</th>
                        <td><?php echo $employer['residential_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Work Address</th>
                        <td><?php echo $employer['work_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Job Title</th>
                        <td><?php echo $employer['job_title']; ?></td>
                    </tr>
                    <tr>
                        <th>NIN Upload</th>
                        <td><a href="uploads/<?php echo $employer['nin_upload']; ?>" target="_blank">View</a></td>
                    </tr>
                    <tr>
                        <th>Official ID Card Upload</th>
                        <td><a href="uploads/<?php echo $employer['official_idcard_upload']; ?>" target="_blank">View</a></td>
                    </tr>
                    <tr>
                        <th>Passport Photograph</th>
                        <td><a href="uploads/<?php echo $employer['passport_photograph']; ?>" target="_blank">View</a></td>
                    </tr>
                    <tr>
                        <th>Referee Full Name</th>
                        <td><?php echo $employer['referee_fullname']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Residential Address</th>
                        <td><?php echo $employer['referee_residential_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Work Address</th>
                        <td><?php echo $employer['referee_work_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Job Title</th>
                        <td><?php echo $employer['referee_job_title']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Email</th>
                        <td><?php echo $employer['referee_email']; ?></td>
                    </tr>
                    <tr>
                        <th>Referee Phone Number</th>
                        <td><?php echo $employer['referee_phone_no']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <h1>Work Specifications</h1>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Job</th>
                        <th>Renumeration Period</th>
                        <th>Renumeration Amount</th>
                        <th>Accomodation</th>
                        <th>Status</th>
                        <th>Approve</th>
                        <th>Disapprove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($workSpecs as $workSpec) : ?>
                        <tr>
                            <td><?php echo $workSpec['job']; ?></td>
                            <td><?php echo $workSpec['renumeration_period']; ?></td>
                            <td><?php echo $workSpec['renumeration_amount']; ?></td>
                            <td><?php echo $workSpec['accommodation']; ?></td>
                            <td><?php echo $workSpec['status']; ?></td>
                            <td><a href="process/approve-employer.php?id=<?php echo $employer['id']; ?>&workSpecId=<?php echo $workSpec['id']; ?>" class="btn btn-success">Approve</a></td>
                            <td><a href="process/disapprove-employer.php?id=<?php echo $employer['id']; ?>&workSpecId=<?php echo $workSpec['id']; ?>" class="btn btn-danger">Disapprove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>