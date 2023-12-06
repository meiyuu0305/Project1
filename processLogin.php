<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["uname"] &&
        isset($_POST["pass"])) {
            //check if both username and password were posted
            $user_name = $_POST["uname"];
            echo "Welcome $user_name <br>";
            echo "Validating user login ...<br>";
            echo "Redirecting ...";
        })
}