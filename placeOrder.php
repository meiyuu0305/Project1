<?php
session_start();
require_once ('CreateDb.php');
require_once ("component.php");


$db = new CreateDb("Productdb", "Producttb");
$con = new mysqli("localhost","root","","Productdb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    // echo "<h1>Connection failed: . mysqli_connect_error()</h1>";
}

$total= 0;
$count = 0;
$tax_perc = 10; 
$product = array();
    if(isset($_SESSION['cart'])){
    $product_id  = array_column($_SESSION['cart'], 'id');
    $result = $db->getData();
    while($row = mysqli_fetch_assoc($result)){
        foreach($product_id  as $id){
            if($row['id'] == $id){
                $total = $total + (float)$row['price'];
                array_push($product, $id);
                $count +=1;
            }
        }
    }
}
else{
    echo "<h5>Cart is Empty</h5>";
}
$tax_perc = (float)($tax_perc/100)* (float)$total; 
$price = (float)$total;
$total = (float)$tax_perc + (float)$deli_perc + (float)$total;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $creditCard = $_POST['creditCard'];
    $zip =  $_POST['zip'];
    $address = $_POST['address'];
    if ($name == "" || $phone == "" || $creditCard == "" || $zip == "" || $address == "") {
        echo "<script>alert('Field(s) cannot be empty')</script>";
        echo "<script>window.location = 'shipment.php'</script>";
    }
    $cus_id = (int)$_SESSION["id"];
    $order_id = (int)rand(1000,5000);
    $stmt = $con->prepare("INSERT INTO orders (name, phone, creditCard, zip, shipping_loca, order_id, cus_id) VALUES (?,?,?,?,?,?,?)");
    $stmt1 = $con->prepare("INSERT INTO order_item (order_id, product_id, price) VALUES (?,?,?)");


if (!$stmt) {
    die("Error in prepare statement: " . $con->error);
}
    $stmt -> bind_param("sssissi", $name, $phone, $creditCard, $zip, $address, $order_id, $cus_id);
    $str_product = implode(" ",$product); 
    $stmt1 -> bind_param("isf", $order_id, $str_product, $total);

    $run = $stmt -> execute();
    $run1 = $stmt1 -> execute();
    if ($run && $run1) {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location = 'shipment.php'</script>";
    } else {
        echo "<script>alert('Unsuccessful:'. mysqli_error($con) .')</script>";
        echo "<script>window.location = 'shipment.php'</script>";
        echo "<h1>Unsuccessful: " . mysqli_error($con) . "</h1>";
    }
} else {
    header("Location: index.php");
}



