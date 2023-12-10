//the login functionality is built off of the tutorial available at
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'time_management_proj');

    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DN_NAME,
                        DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:ERRMODE_EXCEPTION;)
        echo "Connected successfully";
    }
    catch (PDOException $e) {
        die("ERROR: Could not connect." . $e->getMessage());
    }
?>