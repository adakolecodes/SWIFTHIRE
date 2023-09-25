<?php
//Start session so as to make use of session on this page
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="STYLE/SIGNUP.CSS">
</head>
<body>

    <header>
        <?php include_once "component/navbar.php"; ?>
       <div>
        
    <div class="form">
        <h4>SIGN UP PAGE</h4>
            <div class="sign-up">
                <p><?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                    }
                        unset($_SESSION['error']);
                    ?>
                </p>
                <form action="process/signup.php" method="POST">
                    <select name="category" required>
                        <option selected disabled value="">Select category</option>
                        <option value="Employer">Employer</option>
                        <option value="Employee">Employee</option>
                    </select>
                    <input type="email" name="email_address" class="input-box" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirmPassword" placeholder="confirm password" required>
                    <span><button type="submit" name="employee">Register</button></span>
                </form>
           
            <a href="login.php" class="existing-account">Already have an account? Login</a>
            </div>

            <div class="flex-box">Dial <span>*943#</span> <span2> for</span2><br></span>Manual <br> Registration

            </div>
            </div>
    </div>
   
    <footer>

        <section class="footer">

</section>

</div>
    </footer>
    
</body>
</html>