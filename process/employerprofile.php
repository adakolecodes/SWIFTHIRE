<?php
if(isset($_POST['employer'])){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    $employer_id = filter_input(INPUT_POST, 'employer_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $middle_name = filter_input(INPUT_POST, 'middle_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date_of_birth = filter_input(INPUT_POST, 'date_of_birth', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $marital_status = filter_input(INPUT_POST, 'marital_status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age_group = filter_input(INPUT_POST, 'age_group', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $whatsapp_no = filter_input(INPUT_POST, 'whatsapp_no', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone_no = filter_input(INPUT_POST, 'phone_no', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $residential_address = filter_input(INPUT_POST, 'residential_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $work_address = filter_input(INPUT_POST, 'work_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $job_title = filter_input(INPUT_POST, 'job_title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $nin_upload = $_FILES['nin_upload']['name'];
    $nin_upload_image_tmp = $_FILES['nin_upload']['tmp_name'];
    $nin_upload_image_ext = explode('.', $nin_upload);
    $nin_upload_image_ext = strtolower(end($nin_upload_image_ext));
    $nin_upload = time().'_1'.$first_name.'.'.$nin_upload_image_ext;
    $nin_upload_target_dir = "../uploads/{$nin_upload}";
    
    $official_idcard_upload = $_FILES['official_idcard_upload']['name'];
    $official_idcard_upload_image_tmp = $_FILES['official_idcard_upload']['tmp_name'];
    $official_idcard_upload_image_ext = explode('.', $official_idcard_upload);
    $official_idcard_upload_image_ext = strtolower(end($official_idcard_upload_image_ext));
    $official_idcard_upload = time().'_2'.$first_name.'.'.$official_idcard_upload_image_ext;
    $official_idcard_upload_target_dir = "../uploads/{$official_idcard_upload}";
    
    $passport_photograph = $_FILES['passport_photograph']['name'];
    $passport_photograph_image_tmp = $_FILES['passport_photograph']['tmp_name'];
    $passport_photograph_image_ext = explode('.', $passport_photograph);
    $passport_photograph_image_ext = strtolower(end($passport_photograph_image_ext));
    $passport_photograph = time().'_3'.$first_name.'.'.$passport_photograph_image_ext;
    $passport_photograph_target_dir = "../uploads/{$passport_photograph}";

    $referee_fullname = filter_input(INPUT_POST, 'referee_fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_residential_address = filter_input(INPUT_POST, 'referee_residential_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_work_address = filter_input(INPUT_POST, 'referee_work_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_job_title = filter_input(INPUT_POST, 'referee_job_title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $referee_email = filter_input(INPUT_POST, 'referee_email', FILTER_SANITIZE_EMAIL);
    $referee_phone_no = filter_input(INPUT_POST, 'referee_phone_no', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    // Define the SQL INSERT statement with placeholders.
    $sql = "INSERT INTO employers (
        employer_id, 
        title, 
        first_name, 
        middle_name, 
        last_name, 
        date_of_birth, 
        marital_status, 
        gender, 
        age_group, 
        whatsapp_no, 
        phone_no, 
        email, 
        residential_address, 
        work_address, 
        job_title, 
        nin_upload, 
        official_idcard_upload, 
        passport_photograph, 
        referee_fullname, 
        referee_residential_address, 
        referee_work_address, 
        referee_job_title, 
        referee_email, 
        referee_phone_no
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement.
    $stmt = $pdo->prepare($sql);

    // Bind values to the placeholders and execute the statement.
    $stmt->execute([
        $employer_id,
        $title, 
        $first_name, 
        $middle_name, 
        $last_name, 
        $date_of_birth, 
        $marital_status, 
        $gender, 
        $age_group, 
        $whatsapp_no, 
        $phone_no, 
        $email, 
        $residential_address, 
        $work_address, 
        $job_title, 
        $nin_upload, 
        $official_idcard_upload, 
        $passport_photograph, 
        $referee_fullname, 
        $referee_residential_address, 
        $referee_work_address, 
        $referee_job_title, 
        $referee_email, 
        $referee_phone_no
    ]);

     // Check if the INSERT was successful.
     if ($stmt->rowCount() > 0) {
        $_SESSION['success'] = "Profile information set successfully";
        if(isset($_FILES['nin_upload']['name'])){
            move_uploaded_file($nin_upload_image_tmp, $nin_upload_target_dir);
        }
        if(isset($_FILES['official_idcard_upload']['name'])){
            move_uploaded_file($official_idcard_upload_image_tmp, $official_idcard_upload_target_dir);
        }
        if(isset($_FILES['passport_photograph']['name'])){
            move_uploaded_file($passport_photograph_image_tmp, $passport_photograph_target_dir);
        }
        // move_uploaded_file($official_idcard_upload_image_tmp, $official_idcard_upload_target_dir);
        // move_uploaded_file($passport_photograph_image_tmp, $passport_photograph_target_dir);
        header("Location: ../dashboard-employer.php");
    } else {
        $_SESSION['error'] = "Could not process profile information";
        header("Location: ../employer-profile.php");
    }



}