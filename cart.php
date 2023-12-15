<?php

session_start();

require_once ('CreateDb.php');
require_once ("component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" media='screen and (max-width: 480px)' href="mobile-style.css">
    <link rel="stylesheet" media="screen and (min-width: 481px) and (max-width: 768px)" href="tablet-style.css"> -->
    <link rel="stylesheet" media="screen and (min-width: 769px)" href="desktop-style.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Galaxy Store - purchase bag</title>
</head>
<body style="background-image: none; height:100%; margin:0%">
<section class = "store-background">
    <div class = "store-head"> Galaxy Store </div>
    <div id="highlight" style="background-color: none;"> Purchase your <span style="background-color: #a669f0; padding:0px 20px; "> key to success </span> </div>
    <img  style="position:absolute; right:150px; background-color: #e3cbff74; border-radius:  80% 20% 32% 68% / 58% 22% 78% 42%; " src="./upload/store-background.png" >
    <a href="index.php"> <img src="./upload/arrow.png" style="margin: 30px 30px; width: 40px"></a>
    <a href="cart.php" ><button class ="shopping-bag"><img src="./upload/shopping-bag-icon.png" style="object-fit: cover; justify-content: center; height:100%; width:100%"></button></a>
</section>
<section style ="display:grid; grid-template-columns: 47% 47%; width: 100%; column-gap:20px;">
<section class ="checkout">
    <div class = "checkout-head" style="text-align: center;  background-color: black;color: white;">Your shopping cart</div>
    <?php
$total= 0;
$count = 0;
$tax_perc = 10; 
$deli_perc = 5;
    if(isset($_SESSION['cart'])){
    $product_id  = array_column($_SESSION['cart'], 'id');
    $result = $db->getData();
    while($row = mysqli_fetch_assoc($result)){
        foreach($product_id  as $id){
            if($row['id'] == $id){
                cartElement($row['id'],$row['name'], $row['price'], $row['img']);
                $total = $total + (float)$row['price'];
                $count +=1;
            }
        }
    }
    $tax_perc = (float)($tax_perc/100)* (float)$total; 
    $deli_perc = (float)($deli_perc/100)* (float)$total; 
    $total = (float)$tax_perc + (float)$deli_perc + (float)$total;
}
else{
    echo "<h5>Cart is Empty</h5>";
}
    ?>
</section>
<section class ="payment">
    <div class=  "checkout-head" style="text-align: center;  background-color: black;color: white; ">Payment</div>
    <?php
     if($count != 0){
        echo "<div> Price ($count items) </div>";
     }
     else{
        echo "<div> Price (0 item) </div>";
     }
    ?>
    <div>Delivery Changes  $<?php echo number_format((float)$deli_perc, 2, '.', '')?></div>
    <div>Tax  $<?php echo number_format((float)$tax_perc,2,'.','')?></div>
    <div>Total Amount $<?php echo number_format((float)$total,2,'.','')?></div>
    <form action="shipment.php">
    <button class ="bt-checkout">Checkout</button>
    </form>
</section>
</section>
</body>
</html>