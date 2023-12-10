<?php

require_once "config.php";
//define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

//process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    }
    elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    }
    else {
        //prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        //attempt to execute select statement
        if ($stmt = $pdo->prepare($sql)) {
            //bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            //set parameters
            $param_username = trim($_POST["username"]);
            //attempt to execute prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = "This username is already taken.";
                }
                else {
                    $username = trim($_POST["username"]);
                    $username_err = "";
                }
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
            //close statement
            unset($stmt);
        }
    }
    //validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    }
    elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    }
    else {
        $password = trim($_POST["password"]);
        $password_error = "";
    }
    //validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
        $confirm_password_err = "";
    }
    else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    //check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        if ($stmt = $pdo->prepare($sql)) {
            //bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            //set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); //hashes password
            //attempt to execute prepared statement
            if ($stmt->execute()) {
                //redirect to login page
                echo "Sending you to login page...";
                header("location: login.php");
            }
            else {
                echo "Something went wrong. Please try again later.";
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
        <title>Sign Up</title>
    </head>
    <body>
        <h2>Sign Up</h2>
        <p>Please fill out this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $user; ?>">
                <span class="error">* <?php echo $username_err; ?></span>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo $pass; ?>">
                <span class="error">* <?php echo $password_err; ?></span>
            </div>
            <div>
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" value="<?php echo $confirm_pass; ?>">
                <span class="error">* <?php echo $confirm_password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                <a href="login.php"><button>Login here</button></a>
            </div>
        </form>
    </body>
</html>


