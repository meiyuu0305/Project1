<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //username and password come from form in this file

        $user = mysqli_real_escape_string($db, $_POST['user']);
        $pass = mysqli_real_escape_string($db, $_POST['pass']);

        $sql = "SELECT id FROM admin WHERE user = '$user' and pass = '$pass'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        //if result found, table row must be 1 row

        if($count == 1) {
            session_register("user");
            $_SESSION['login_user'] = $user;
            header("location: welcome.php");
        }
        else {
            $error = "Your login name or password is invalid";
        }
    }
?>

