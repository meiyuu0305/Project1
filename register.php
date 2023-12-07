//note: the rough structure for the login functionality is derived from
//this tutorial: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

<?php
//include config file
include(config.php);

//define variables to store input for account variables
$user = $pass = $firstname = $lastname = $confirm_pass = "";
//errors for required attributes
$user_err = $pass_err = $confirm_pass_err = "";

//process data from form

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["user"])))
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" media='screen and (max-width: 480px)' href="mobile-style.css">
        <link rel="stylesheet" media="screen and (min-width: 481px) and (max-width: 768px)" href="tablet-style.css">
        <link rel="stylesheet" media="screen and (min-width: 769px)" href="desktop-style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
        <title>Sign Up</title>
    </head>
    <body>
        <div>
            <h1>Sign Up</h1>
            <p>Please fill this form out to create an account.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label>Username</label>
                <input type="text" name="user" class="form-control 
                    <?php echo (!empty($user_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $user; ?>">
                    <span class="invalid-feedback"><?php echo $user_err; ?></span>
                <label>Password</label>
                <input type="password" name="pass" class="form-control 
                    <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $pass; ?>">
                    <span class="invalid-feedback"><?php echo $pass_err; ?></span>
                <label>Confirm Password</label>
                <input type="password" name="confirm-pass" class="form-control 
                    <?php echo (!empty($confirm_pass_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $confirm_pass; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_pass_err; ?></span>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                <p>Already have an account? <a href="login.php"><button>Login here</button>
            </form>
        </div>
    </body>
</html>
