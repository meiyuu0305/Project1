<?php

//initialize the session
session_start();

//check if the user is already loggen in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: frontpage.html");
    exit;
}

//include config file
require_once "config.php";

//define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

//processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    }
    else {
        $username = trim($_POST["username"]);
        $username_err = "";
    }
    //check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    }
    else {
        $password = trim($_POST["password"]);
        $password_err = "";
    }
    //validate credentials
    if (empty($username_err) && empty($password_err)) {
        //prepare sql statement
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        if ($stmt = $pdo->prepare($sql)) {
            //bind variables to prepared statement
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            //set parameters
            $param_username = trim($_POST["username"]);
            //attempt to execute prepared statement
            if ($stmt->execute()) {
                //check if username exists, then verify password if so
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if (password_verify($password, $hashed_password)) {
                            //password is correct, start new session
                            session_start();
                            //store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            //reset error messages
                            $username_err = "";
                            $password_err = "";
                            $login_err = "";

                            //redirect user to front page
                            header("location: frontpage.html");
                        }
                        else {
                            //password not valid, display login error
                            $login_err = "Invalid username or password.";
                        }
                    }
                }
                else {
                    //username doesn't exist, display login error
                    $login_err = "Invalid username or password.";
                }
            }
            else {
                echo "Something went wrong. Please try again.";
            }
            //close statement
            unset($stmt);
        }
    }
    //close connection
    unset($pdo);
}
?>


<!DOCTYPE html>

<html class="form">

    <head>
        <link rel="stylesheet" media='screen and (max-width: 480px)' href="mobile-style.css">
        <link rel="stylesheet" media="screen and (min-width: 481px) and (max-width: 768px)" href="tablet-style.css">
        <link rel="stylesheet" media="screen and (min-width: 769px)" href="desktop-style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <fieldset>
            <legend>Log In</legend>
            <p>Use your username and password to log in.</p>
            <div>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error">* <?php echo $username_err; ?></span>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span class="error">* <?php echo $password_err; ?></span>
            </div>
            <div>
                <?php
                    if (!empty($login_err)) {
                        echo '<span class="error">' . $login_err . '</div>';
                    }
                ?>
            </div>
            <div>
                <input type="submit" value="Login">
                <input type="reset" value="Reset">
                <p>Don't have an account?</p> <a href="register.php"><button>Sign up now</button></a>
            </div>
        </fieldset>
        </form>
    </body>
</html>


<!--DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>

    <body>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php if(!empty($login_err)) {
            echo '<div class="error">' . $login_err . '</div>';
        } ?>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
            <div>
                <label>Username:</label>
                <input type="text" name="user" value="<?php echo $user; ?>">
                <span class="error">* <?php echo $user_err; ?></span>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="pass" value="<?php echo $pass; ?>">
                <span class="error">* <?php echo $pass_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Login">
                <input type="reset" value="Reset">
                <p>Don't have an account?
                    <a href="register.php"><button>Sign Up</button></a>
                </p>
            </div>
        </form>
    </body>
</html-->

