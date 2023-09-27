<?php
if((isset($_POST['admin']))){

    //Start session so as to make use of session on this page
    session_start();

    //Link your database-connect file
    require "../config/database-connect.php";

    //Get user inputs from form
    $email_address = filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //Validate for empty inputs
    if(empty($email_address) || empty($password)){
        $_SESSION['error'] = "All fields are required";
        header("Location: ../login.php");
        exit();
    }

    //Check if user exists
    $sql = "SELECT * FROM admins WHERE email_address = ? and password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email_address, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        $_SESSION['success'] = "Login Successful";
        $_SESSION['id'] = $user['id'];
        $_SESSION['email_address'] = $user['email_address'];
        header("Location: ../dashboard-admin.php");
    }else{
        $_SESSION['error'] = "Invalid email or password";
        header("Location: ../admin-login.php");
    }
}
?>