<?php

//initialize session
session_start();

//if user is logged in, send them to front page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggenin"] === true) {
    header(location: front_page.html);
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
                            header("location: front_page.html");
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

?>



