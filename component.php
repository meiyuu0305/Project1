<?php
function component($productid,$productname, $productprice, $productimg){
    $element = "
    <div class=\"products\">
        <form action=\"index.php\" method =\"post\">
            <img src=\"$productimg\"> $productname - $productprice
            <button type =\"submit\" name = \"add\" id=\"add\"><span class=\"material-symbols-outlined\">shopping_bag</span></button> 
            <input type='hidden' name='id' value='$productid'>
        </form>
    </div>
    ";
    echo $element;
}

function cartElement($productid,$productname, $productprice, $productimg){
    $element = "
    <div class=\"checkout-items\">
    <form action = \"cart.php?action=remove&id=$productid\" method =\"post\"> 
        <img src= \"$productimg\"> 
        <div class =\"products\" style=\"position: absolute; margin-left: 20px; height:40px\"> $productname </div>
        <div class =\"price\"> $productprice</div>
        <button type = \"submit\" name=\"remove\" id=\"remove\">Remove</button>
        <input type='hidden' name='id' value='$productid'>
    </form></div>
    ";
    echo $element;
}
function cartElement1($productid,$productname, $productprice, $productimg){
    $element = "
    <div class=\"checkout-items\">
        <img src= \"$productimg\" style=\"width:100; height:100px; object-fit: cover;\"> 
        <div class =\"products\" style=\"position: absolute; margin-left: 20px; height:40px; text-wrap:wrap; width: 150px\"> $productname </div>
        <div class =\"price\" style=\"font-size:50px;\"> $productprice</div>
    </div>
    ";
    echo $element;
}
function cartElement4($productid,$productname, $productprice, $productimg){
    $element = "
    <div class=\"checkout-items\">
        <img src= \"$productimg\" style=\"width:250px; height:250px; object-fit: cover; margin-left: 70px;\"> 
        <div class =\"products\" style=\"position: absolute; margin-left: 50px; height:40px; text-wrap:wrap; width: 150px\"> $productname </div>
        <div class =\"price\" style=\"font-size:50px;\"> $productprice</div>
    </div>
    ";
    echo $element;
}
function cartElement2($order_id){
    $element = "
    <div class = \"checkout-head\" style=\"text-align: center;  background-color: black;color: white;\">Order number #$order_id</div>
    ";
    echo $element;
}
function cartElement3($orderPrice){
    $element = "
    <div class=\"hist-items\">
        <div class =\"hist-product\"> $$orderPrice </div>
    </div>
    ";
    echo $element;
}
