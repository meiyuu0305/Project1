<?php
function Cus_ID($id, $username){
    $con = mysqli_connect("localhost", "root", "root","time_management_proj");
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC);
    return $id['id'];
}