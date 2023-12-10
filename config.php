

<?php

/*the login functionality is built off of the tutorial available at
https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php*/


    try {
        $connString = "mysql:host=localhost;port=3306;dbname=time_management_proj";
        $db_username = "root";
        $db_password = "root";

        $pdo = new PDO($connString, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
?>