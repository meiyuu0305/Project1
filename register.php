<?php

require_once = "config.php";

$user = $pass = $confirm_pass = $firstname = $lastname = "";
$user_err = $pass_err = $confirm_pass_err = $firstname_err = $lastname_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validate username existence
    if (empty(trim($_POST["user"]))) {
        $user_err = "Please enter a username.";
    }
    //validate username characters
    elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))) {
        $user_err = "Username can only contain letters, numbers, and underscores.";
    }
    //validate username uniqueness
    else {
        $sql = "SELECT user FROM users WHERE user = :user";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
            $param_user = trim($_POST["user"]);

            if ($stmt->execute()) {
                if($stmt->rowCount() == 1) {
                    $user_err = "This username is already taken.";
                }
                else {
                    $user = trim($_POST["user"]);
                    $user_err = "";
                }
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    //validate password
    if (empty(trim($_POST["pass"]))) {
        $pass_err = "Please enter a password.";
    }
    elseif (strlen(trim($_POST["pass"])) < 6) {
        $pass_err = "Password must have at least 6 characters.";
    }
    else {
        $pass = trim($_POST["pass"]);
    }
    //validate confirm password
    if (empty(trim($_POST[$confirm_pass]))) {
        $confirm_pass_err = "Please confirm password.";
    }
    else {
        $confirm_pass = trim($_POST["confirm_pass"]);
        if (empty($password_err) && ($pass != $confirm_pass)) {
            $confirm_pass_err = "Password did not match.";
        }
        else {
            $pass_err = "";
            $confirm_pass_err = "";
        }
    }
    //validate first and last names
    if (empty(test_input($_POST["firstname"])) || empty($_POST["firstname"])) {
        $firstname_err = "First name is required.";
    }
    else {
        if (!preg_match('/^[a-zA-Z]+$/', test_input($_POST["firstname"]))) {
            $firstname_err = "Names can only contain letters.";
        }
        else {
            $firstname = test_input($_POST["firstname"]);
            $firstname_err = "";
        }
    }
    if (empty(test_input($_POST["lastname"])) || empty($_POST["lastname"])) {
        $lastname_err = "Last name is required.";
    }
    else {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["lastname"]))) {
            $lastname_err = "Names can only contain letters.";
        }
        else {
            $lastname = test_input($_POST["lastname"]);
            $lastname_err = "";
        }
    }
    if (empty($user_err) && empty($pass_err) && empty($confirm_pass_err) && empty($firstname_err) && empty($lastname_err)) {
        //prepare insert statement
        $sql = "INSERT INTO users (user, pass, firstname, lastname) VALUES
                (:user, :pass, :firstname, :lastname)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
            $stmt->bindParam(":pass", $param_pass, PDO::PARAM_STR);
            $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
            $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);

            //set parameters
            $param_user = $user;
            $param_pass = password_hash($pass, PASSWORD_DEFAULT);
            $param_firstname = $firstname;
            $param_lastname = $lastname;

            if ($stmt->execute()) {
                header("location: login.php");
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
            //close statement
            unset($stmt);
        }
    }
    unset($pdo);
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
    </head>
    <body>
        <h2>Sign Up</h2>
        <p>Please fill out this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
                <label>Confirm Password:</label>
                <input type="password" name="confirm_pass" value="<?php echo $confirm_pass; ?>">
                <span class="error">* <?php echo $confirm_pass_err; ?></span>
            </div>
            <div>
                <label>First Name:</label>
                <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                <span class="error">* <?php echo $firstname_err; ?></span>
            </div>
            <div>
                <label>Last Name:</label>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                <span class="error">* <?php echo $lastname_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                <a href="login.php"><button>Login here</button></a>
            </div>
        </form>
    </body>
</html>
