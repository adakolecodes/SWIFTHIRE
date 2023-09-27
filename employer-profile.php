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
    <title>Employer Profile</title>
    <link rel="stylesheet" href="STYLE/bootstrap.min.css">
</head>
<body>
    

    <div class="container mt-5 mb-5">
        <a href="dashboard-employer.php" class="btn btn-primary">Back to dashboard</a>
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
        <form action="process/employerprofile.php" method="post" enctype="multipart/form-data">
            <div class="form-group" hidden>
                <label for="employer_id">Employer ID:</label>
                <input type="text" class="form-control" id="employer_id" name="employer_id" value="<?php echo $_SESSION['id']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>
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
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
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
                            <option value="18_to_30">18 to 30</option>
                            <option value="31_to_50">31 to 50</option>
                            <option value="over_50">Over 50</option>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="residential_address">Residential Address:</label>
                        <textarea class="form-control" id="residential_address" name="residential_address" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_address">Work Address:</label>
                        <textarea class="form-control" id="work_address" name="work_address" required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_title">Job Title:</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" required>
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
                        <label for="official_idcard_upload">Official ID Card Upload:</label>
                        <input type="file" class="form-control-file" id="official_idcard_upload" name="official_idcard_upload" required>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referee_fullname">Referee Full Name:</label>
                        <input type="text" class="form-control" id="referee_fullname" name="referee_fullname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referee_residential_address">Referee Residential Address:</label>
                        <input type="text" class="form-control" id="referee_residential_address" name="referee_residential_address" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referee_work_address">Referee Work Address:</label>
                        <input type="text" class="form-control" id="referee_work_address" name="referee_work_address" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referee_job_title">Referee Job Title:</label>
                        <input type="text" class="form-control" id="referee_job_title" name="referee_job_title" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referee_email">Referee Email:</label>
                        <input type="email" class="form-control" id="referee_email" name="referee_email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referee_phone_no">Referee Phone Number:</label>
                        <input type="text" class="form-control" id="referee_phone_no" name="referee_phone_no" required>
                    </div>
                </div>
            </div>
            
            <button type="submit" name="employer" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>