<?php
session_start();

require_once ('CreateDb.php');
require_once ("component.php");

$db = new CreateDb("Productdb", "Producttb");
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Shipment</title>
</head>
<body style ="background-image:none">
<section class = "payment-header">
    <div class = "store-head" style="font-size: 60px; position: absolute; left: 650px; top: 30px;"> Galaxy Store </div>
    <a href="index.php"> <img src="./upload/arrow.png" style="margin: 30px 30px; width: 40px;"></a>
    <a href="cart.php" ><button class ="shopping-bag"><img src="./upload/shopping-bag-icon.png" style="object-fit: cover; justify-content: center; height:100%; width:100%"></button></a> 
</section>
<section class="checkout" style="background-color: beige; width: 30%; float:left">
<?php
$total= 0;
$count = 0;
$tax_perc = 10; 
    if(isset($_SESSION['cart'])){
    $product_id  = array_column($_SESSION['cart'], 'id');
    $result = $db->getData();
    while($row = mysqli_fetch_assoc($result)){
        foreach($product_id  as $id){
            if($row['id'] == $id){
                cartElement1($row['id'],$row['name'], $row['price'], $row['img']);
                $total = $total + (float)$row['price'];
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
    ?>
    <div style="font-size:30px;">Tax Amount $<?php echo number_format((float)$tax_perc,2,'.','')?></div>
    <div>Total Amount $<?php echo number_format((float)$total,2,'.','')?></div>
</section>
<section style="width:64%; display: inline-block;positive:relative; float:right; margin-top:50px ">
    <form action="placeorder.php" class="info" method="POST">
        <div style="width:50%; float:left">
        <label for="name" >Full Name</label>
        <input type="text" name="name" required minlength="2" maxlength="30"  ></div>

        <div style="width:50%; float:right">
        <label for="phone">Phone</label>
        <input type="text" name="phone"required minlength="6" maxlength="14" ></div>

        <div style="width:50%; float:left">
        <label for="creditCard">Credit Card</label>
        <input type="text" name="creditCard" required minlength="10" maxlength="15" > </div>

        <div  style="width:50%; float:right">
        <label for="zip" required minlength="3" maxlength="6" >Zip Code</label>
        <input type="text" name="zip"></div>

        <div>
        <button type="submit" name ="placeorderBt" class="bt-checkout" style="width:200px;font-size:25px">Place order</button>
    </form>
</section>
    
</body>
</html>
