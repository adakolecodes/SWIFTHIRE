<?php
//Start session so as to make use of session on this page
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="STYLE/LOGIN.CSS">
</head>
<body>

    <header>
        <?php include_once "component/navbar.php"; ?>
       <div>
        
    <div class="form">
        <h4>Sign into your account</h4>
            <div class="login">
                <p><?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                    }
                        unset($_SESSION['error']);
                    ?>
                </p>
                <form action="process/login.php" method="POST">
                    <input type="email" name="email_address" class="input-box" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <span><button type="submit" name="employee">Login</button></span>
                </form>

                <div>
                <a href="signup.php" class="existing-account">Don't have an account yet? Sign up</a>
                </div>
                <br>
                <div>
                <a href="" class="password">forgot password?</a>
                </div>
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