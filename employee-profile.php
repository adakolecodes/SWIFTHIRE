<?php
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>
<body>
    

    <div class="container mt-5 mb-5">
        <a href="dashboard-employee.php" class="btn btn-primary">Back to dashboard</a>
        <h2>Personal Information Form</h2>
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
        <form action="process/employeeprofile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group" hidden>
                <label for="employee_id">Employee ID:</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" value="<?php echo $_SESSION['id']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="marital_status">Marital Status:</label>
                        <select class="form-control" id="marital_status" name="marital_status" required>
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="age_group">Age Group:</label>
                        <select class="form-control" id="age_group" name="age_group" required>
                            <option value="">Select</option>
                            <option value="18 to 30">18 to 30</option>
                            <option value="31 to 50">31 to 50</option>
                            <option value="over 50">Over 50</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="whatsapp_no">WhatsApp Number:</label>
                        <input type="text" class="form-control" id="whatsapp_no" name="whatsapp_no" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone_no">Phone Number:</label>
                        <input type="text" class="form-control" id="phone_no" name="phone_no" required>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="highest_qualification">Highest Qualification:</label>
                        <select class="form-control" id="highest_qualification" name="highest_qualification" required>
                            <option value="">Select</option>
                            <option value="O Level">O Level</option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master's Degree">Master's Degree</option>
                            <option value="Ph.D.">Ph.D.</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="residential_address">Residential Address:</label>
                        <textarea class="form-control" id="residential_address" name="residential_address" required></textarea>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nin_upload">NIN Upload:</label>
                        <input type="file" class="form-control-file" id="nin_upload" name="nin_upload" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="proof_of_highest_qualification">Proof of Highest Qualification:</label>
                        <input type="file" class="form-control-file" id="proof_of_highest_qualification" name="proof_of_highest_qualification" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="passport_photograph">Passport Photograph:</label>
                        <input type="file" class="form-control-file" id="passport_photograph" name="passport_photograph" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="referee_full_name">Referee Full Name:</label>
                        <input type="text" class="form-control" id="referee_full_name" name="referee_full_name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="referee_residential_address">Referee Residential Address:</label>
                        <input type="text" class="form-control" id="referee_residential_address" name="referee_residential_address" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="referee_work_address">Referee Work Address:</label>
                        <input type="text" class="form-control" id="referee_work_address" name="referee_work_address" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="referee_email_address">Referee Email Address:</label>
                        <input type="email" class="form-control" id="referee_email_address" name="referee_email_address" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="referee_phone_no">Referee Phone Number:</label>
                        <input type="text" class="form-control" id="referee_phone_no" name="referee_phone_no" required>
                    </div>
                </div>
            </div>
            
            <button type="submit" name="employee" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>