<?php

//initialize the session
session_start();

//check if the user is already loggen in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

//include config file
require_once "config.php";



?>

/*<?php

//initialize session
session_start();

//if user is logged in, send them to front page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggenin"] === true) {
    header(location: frontpage.html);
    exit;
}

//include config
require_once "config.php";

//define variables and error messages
$user = $pass = "";
$user_err = $pass_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check if username is empty
    if (empty(trim($_POST["user"]))) {
        $user_err = "Please enter username.";
    }
    else {
        $user = trim($_POST["user"]);
    }
    //check if password is empty
    if (empty(trim($_POST["pass"]))) {
        $pass_err = "Please enter password.";
    }
    else {
        $pass = trim($_POST["pass"]);
    }
    //validate credentials using database table
    if (empty($user_err) && empty($pass_err)) {
        //prepare select statement
        $sql = "SELECT user, pass FROM users WHERE user = :user";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
            $param_user = trim($_POST["user"]);
            if ($stmt->execute()) {
                //check if username exists, if yes then verify password
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $user = $row["user"];
                        $hashed_pass = $row["pass"];
                        if (password_verify($pass, $hashed_pass)) {
                            //password correct, start session and send to front page
                            session_start();
                            $_SESSION["loggenin"] = true;
                            $_SESSION["username"] = $user;
                            header("location: frontpage.html");
                        }
                        else {
                            $login_err = "Invalid username or password.";
                        }
                    }
                }
                else {
                    $login_err = "Invalid username or password.";
                }
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

?>*/

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

