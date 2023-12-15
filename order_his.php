<?php

session_start();
require_once ('CreateDb.php');
require_once ('component.php');

// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media='screen and (max-width: 480px)' href="mobile-style.css">
    <link rel="stylesheet" media="screen and (min-width: 481px) and (max-width: 768px)" href="tablet-style.css">
    <link rel="stylesheet" media="screen and (min-width: 769px)" href="desktop-style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Purchase History</title>
</head>
<body style="background-image: none; height:100%; margin:0%">
<section class = "store-background">
    <div class = "store-head" style="font-size:180px" > Purchase History </div>
    <img  style="position:absolute; right:150px" src="./upload/store-background.png" >
    <a href="frontpage.php" ><img src="./upload/home.png" style="margin: 30px 30px; width: 40px"> </a>
    <a href="order_his.php"><button class ="shopping-bag" style="right:70px;"><img src="purchase_his.png" style="object-fit: cover; justify-content: center; height:100%; width:100%;"></button></a>
    <a href="cart.php" ><button class ="shopping-bag"><img src="./upload/shopping-bag-icon.png" style="object-fit: cover; justify-content: center; height:100%; width:100%"></button></a>
</section>
<section class ="checkout">
    <?php
    $val=$_SESSION["id"];
    $result = $database->matchUserID($val);
    foreach($result as $value){
        cartElement2($value);
        $result1 = $database->eachOrder($value);
        $order_price= $result1[count($result1)-1];
        cartElement3($order_price);
        $order_arr = $result1[0];
        $arr_product = explode(" ", ($order_arr));
        foreach($arr_product as $product){
            $result = $database->getData();
            while($row = mysqli_fetch_assoc($result)){
                    if($row['id'] == $product){
                        cartElement4($row['id'],$row['name'], (number_format((float)$row['price'],2,'.','')), $row['img']);
                    }
                }
        }
    }
?>
</section>
</body>
</html>
