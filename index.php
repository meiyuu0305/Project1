<?php

session_start();
require_once ('CreateDb.php');
require_once ('component.php');

// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");
if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){ 
        $item_array_id = array_column($_SESSION['cart'], "id");
        if(in_array($_POST['id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }

    }else{
        $item_array = array(
                'id' => $_POST['id']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


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
    <title>Galaxy Store</title>
</head>
<body style="background-image: none; height:100%; margin:0%">
<section class = "store-background">
    <div class = "store-head" > Galaxy Store </div>
    <div id="highlight" style="background-color: none;"> team work makes the <span style="background-color: #a669f0; padding:0px 20px; "> dream</span> work</div>
    <img  style="position:absolute; right:150px" src="./upload/store-background.png" >
    <a href="frontpage.php" ><img src="./upload/home.png" style="margin: 30px 30px; width: 40px"> </a>
    <a href="cart.php" ><button class ="shopping-bag"><img src="./upload/shopping-bag-icon.png" style="object-fit: cover; justify-content: center; height:100%; width:100%"></button></a>
</section>
<section class = "store-scroll-menu">
    <a class="store_content" id="stickers_content"><span class="material-symbols-outlined">folder</span> Stickers set</a>
    <a class="store_content"><span class="material-symbols-outlined"> monetization_on</span> Contribute</a>
    <a class="store_content"><span class="material-symbols-outlined"> diversity_3</span> Group membership</a>
    <a class="store_content"><span class="material-symbols-outlined"> contrast</span> Themes</a>
    <a class="store_content"><span class="material-symbols-outlined"> music_note </span> Music</a>
</section>
<section class ="store-products" id="stickers" >
<?php
    $result = $database->getData();
    while ($row = mysqli_fetch_assoc($result)){
        component($row['id'],$row['name'],$row['price'],$row['img']);
    }
?>
</section>
<script type="text/javascript"> 
 document.getElementById("stickers_content").onclick= function(){
    var x = document.getElementById("stickers");
    if (x.style.display == "grid") { document.getElementById("stickers").style.display = "none"}
    else{ document.getElementById("stickers").style.display = "grid"}
 }
</script>
</body>
</html>