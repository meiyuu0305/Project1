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
    //validate username
    if(empty(trim($_POST["user"]))) {
        $user_err = "Please enter a username.";
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))) {
        $user_err = "Username can only contain letters, numbers, and underscores.";
    }
    else {
        //check is username already exists
        $sql = "SELECT user FROM users WHERE user = ?";
        if($stmt = mysqli_prepare($link, $sql)) {
            //bind varaibles to prepared statement
            mysqli_stmt_bind_param($stmt, "s", $paramuser);
            $paramuser = trim($_POST["user"]);
            //attempt to execute prepared statement
            if(mysqli_stmt_execute($stmt)) {
                if(mysqli_stmt_num_rows($stmt) != 0) {
                    $user_err = "This username is already taken.";
                }
                else {
                    $user = trim($_POST["user"]);
                }
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    //validate password
    if(empty(trim($_POST["pass"]))) {
        $pass_err = "Please enter a password.";
    }
    elseif(strlen(trim($_POST["pass"])) < 6) {
        $pass_err = "Password must have at least 6 characters.";
    }
    else {
        $pass = trim($_POST["pass"]);
    }
    //validate confirm password
    if(empty(trim($_POST["confirm-pass"]))) {
        $pass_err = "Please confirm password.";
    }
    else {
        $confirm_pass = trim($_POST["confirm-pass"]);
        if(empty($pass_err) && ($pass != $confirm_pass)) {
            $confirm_pass_err = "Password did not match.";
        }
    }
    //if firstname and lastname fields not empty, save those
    if(!empty(trim($_POST["firstname"]))) {
        $firstname = trim($_POST["firstname"]);
    }
    if(!empty(trim($_POST["lastname"]))) {
        $lastname = trim($_POST["lastname"]);
    }
     //check input errors before inserting
     if(empty($user_err) && empty($pass_err) && empty($confirm_pass_err)) {
        //prepare insert statement
        $sql = "INSERT INTO users (user, pass, firstname, lastname) VALUES 
        (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $paramuser, $parampass, $paramfname, $paramlname);
            $paramuser = $user;
            $parampass = password_hash($pass, PASSWORD_DEFAULT); //hash the password
            $paramfname = $firstname;
            $paramlname = $lastname;
            //attempt to execute prepared statement
            if(mysqli_stmt_execute($stmt)) {
                //redirect to login page
                header("location: login.php");
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
            //close statement
            mysqli_stmt_close($stmt);
        }
     }
     //close connection
     mysqli_close($link);
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
                <label>First Name</label>
                <input type="text" name=firstname>
                <label>Last Name</label>
                <input type=text name="lastname">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                <p>Already have an account? <a href="login.php"><button>Login here</button>
            </form>
        </div>
    </body>
</html>
