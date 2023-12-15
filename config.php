

<?php

/*the login functionality is built off of the tutorial available at
https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php*/


    try {
        $connString = "mysql:host=localhost;port=3306";
        $db_username = "root";
        $db_password = "root";

        $pdo = new PDO($connString, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //creating a database to store the logins
        $sql = "CREATE DATABASE IF NOT EXISTS login_db";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "Connection established and database created.";
    }
    catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
?>