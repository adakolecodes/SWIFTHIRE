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
<html>
<head>
    <title>Job Application Form - Employer</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 mb-5">
        <a href="dashboard-employer.php" class="btn btn-primary">Back to dashboard</a>
        <h2>Job Application Form</h2>
        <form action="process/employerworkspec.php" method="post">
            <div class="form-group" hidden>
                <label for="employee_id">Employer ID:</label>
                <input type="text" class="form-control" id="employer_id" name="employer_id" value="<?php echo $_SESSION['id']; ?>" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="job">Job:</label>
                <select class="form-control" id="job" name="job" required>
                    <option selected disabled value="">Select Job</option>
                    <option value="Cleaner">Cleaner</option>
                    <option value="Driver">Driver</option>
                    <option value="Chef">Chef</option>
                    <option value="Security Personnel">Security Personnel</option>
                    <option value="Gardener">Gardener</option>
                    <option value="Nanny">Nanny</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="renumeration_period">Remuneration Period:</label>
                <select class="form-control" id="renumeration_period" name="renumeration_period" required>
                    <option value=""></option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="renumeration_amount">Remuneration Amount:</label>
                <input type="number" class="form-control" id="renumeration_amount" name="renumeration_amount" placeholder="Remuneration Amount" required>
            </div>

            <div class="form-group mb-3">
                <label for="accommodation">Accommodation Provision:</label>
                <select class="form-control" id="accommodation" name="accommodation" required>
                    <option value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group" hidden>
                <label for="status">Status:</label>
                <!-- Display 'Pending' as a placeholder -->
                <input type="text" class="form-control" id="status" name="status" value="Pending" readonly>
            </div>
            
            <button type="submit" name="employer_work_spec" class="btn btn-primary">Submit</button>
           
        </form>

        <hr>
        <div class="mt-5">
            <div>
                <h1>Work Specifications</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through workSpecs using foreach loop -->
                        <?php foreach($workSpecs as $workSpec): ?>
                            <tr>
                                <td><?php echo $workSpec['job']; ?></td>
                                <td><?php echo $workSpec['renumeration_period']; ?></td>
                                <td><?php echo $workSpec['renumeration_amount']; ?></td>
                                <td><?php echo $workSpec['accommodation']; ?></td>
                                <td><?php echo $workSpec['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
