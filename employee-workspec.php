<?php
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Application Form - Employee</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 mb-5">
        <a href="dashboard-employee.php" class="btn btn-primary">Back to dashboard</a>
        <h2>Job Application Form</h2>
        <form action="process/employeeworkspec.php" method="post">
            <div class="form-group" hidden>
                <label for="employee_id">Employee ID:</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" value="<?php echo $_SESSION['id']; ?>" readonly>
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
            
            <button type="submit" name="employee_work_spec" class="btn btn-primary">Submit</button>
           
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
