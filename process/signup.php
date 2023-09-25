<?php
if((isset($_POST['employee'])) || (isset($_POST['employer']))){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    //Get user inputs from form
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email_address = filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //Check if email already exists
    $sql = "SELECT * FROM users WHERE email_address = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email_address]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        $_SESSION['error'] = "Email already exists";
        header("Location: ../signup.php");
        exit();
    }

    //Validate for empty inputs
    if(empty($category) || empty($email_address) || empty($password) || empty($confirmPassword)){
        $_SESSION['error'] = "All fields are required";
        header("Location: ../signup.php");
        exit();
    }

    //Validate password and confirm password
    if($password != $confirmPassword){
        $_SESSION['error'] = "Passwords do not match";
        header("Location: ../signup.php");
        exit();
    }

    //Insert into users table if all validation is passed
    $sql = "INSERT INTO users (category, email_address, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category, $email_address, $password]);

    if($stmt->rowCount() > 0){
        $_SESSION['success'] = "Registration Successful";
        $_SESSION['id'] = $user['id'];
        $_SESSION['category'] = $user['category'];
        $_SESSION['email_address'] = $user['email_address'];
        if($category == "Employer"){
            header("Location: ../dashboard-employer.php");
        }elseif($category == "Employee"){
            header("Location: ../dashboard-employee.php");
        }
    }else{
        $_SESSION['error'] = "Failed to register";
        header("Location: ../signup.php");
    }
}
?>