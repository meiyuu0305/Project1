<?php
    //initialize session
    session_start();
    //check if user is logged in
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
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
    <title>Progress Bar </title>
</head>
<body>
    <div class = "menu1">
                <ul class = "menu_content"> 
                    <li><a id="account_name" class="link" href="team.php"> User </a></li> <!-- Task: Add links -->
                    <li><a class= link href="frontpage.php">Front Page</a></li>
                    <li><a class="link" href="person1.php"> Person 1 </a></li>
                    
                    <li><a class="link" href="person2.php"> Person 2 </a></li>
                    <li><a class="link" href="person3.php"> Person 3 </a></li>
                    <li><a class="link" href="person4.php"> Person 4 </a></li>
                    <li><a class="link" href="person5.php"> Person 5 </a></li>
                    <li><a class="link" href="person6.php"> Person 6 </a></li>
                    <li><a class="link" href="newPerson.php">Add New Team Member</a></li>
                    <li><a class="link" href="newTask.php">Add New Task</a></li>
                    <li><a class="link" href="progress_page.php"> Progress </a></li>
                    
                    <li><a class="link" href="logout.php">Log Out </a><li></li>
                </ul>
                </div> 
    <div style = "padding: 0px 150px;" >
        <div class = "box"> <p class = "heading"> Task 1 </p>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <button class = "inner_box" onclick="counter()"> </button>
            <p class = "count" id ="count"> </p> 
        </div>
    </div>
    <div style = "padding: 20px 150px;">
        <div class = "box"> <p class = "heading"> Task 2 </p>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <button class = "inner_box" onclick="counter0()"> </button>
            <p class = "count" id ="count0"> </p> 
        </div>
    </div>
    <div style = "padding: 10px 150px;">
        <div class = "box"> <p class = "heading"> Task 3</p>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <button class = "inner_box" onclick="counter1()"> </button>
            <p class = "count" id ="count1"> </p> 
        </div>
    </div>
    <div style = "padding: 10px 150px;">
        <div class = "box"> <p class = "heading"> Task 4</p>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <button class = "inner_box" onclick="counter2()"> </button>
            <p class = "count" id ="count2"> </p> 
        </div>
    </div>
</body>
<script >
const buttons = document.querySelectorAll('.inner_box');
buttons.forEach(button => {
  button.addEventListener('click', () => {
      button.classList.add('active');
      count_percent++;
    });
});
var count = 0, count0 = 0, count1 = 0, count2 = 0; 
function counter (){
    count++;
    console.log(count);
    print();
}
function print(){
document.getElementById("count").innerHTML = count *10 + "%";
}
function counter0 (){
    count0++;
    console.log(count0);
    print0();
}
function print0(){
document.getElementById("count0").innerHTML = count0 *10 + "%";
}
function counter1 (){
    count1++;
    print1();
}
function print1(){
document.getElementById("count1").innerHTML = count1 *10 + "%";
}
function counter2 (){
    count2++;
    print2();
}
function print2(){
document.getElementById("count2").innerHTML = count2 *10 + "%";
}
</script>
</html>
