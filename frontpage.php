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
    <title>planets</title>
</head>
<body class ="front_page_body">
    <button class="menu_button" onclick="nav_bar_present()"> </button>
     <div class = "menu1">
                <ul class = "menu_content"> 
                    <li><a id="account_name" class="link" href="team.php"> User </a></li> <!-- Task: Add links -->
                    <li><a class= link href="frontpage.php">Front Page</a></li>
                    <li><a class="link" href="person1.php"> Person 1 </a></li>
                    <!--li><a id="sub_link"> Sub links </a></li>
                    <li><a id="sub_link"> Sub links </a></li>
                    <li><a id="sub_link"> Sub links </a></li-->
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
    <div class = "fun_fact">
        <p id="on_this_day">Today's Date</p>
        <script> 
            const d = new Date(); 
            var i = String(d.getMonth() + 1).padStart(2, '0');
            var k = String(d.getDate()).padStart(2, '0');
            var j = d.getFullYear();
            var str = "Today's Date";
            var date = str.concat(": ",i ,"-", k, "-", j);
            document.getElementById("on_this_day").innerHTML = date;
        </script>
    </div>
    <div class = "planets-container"> 
        <div class = sun> </div>
        <div class = "planet-index" id="first-planet-index" >
            <div class ="route">
                <a href= "progress_page.html" class="person_name"> 
                <div class = "planet-container" id = "first-planet-container">
                <div class = "planet" id="first_planet" > Progress </div>
                </div>
            </div>
        </div>
        <div class = "planet-index" id="second-planet-index">
            <div class ="route">
                <a href= "person1.html" class="person_name"> 
                <div class = "planet-container" id = "second-planet-container">
                <div class = "planet" id="second_planet"> Person 1 </div>
                </div>
            </a>
            </div>
        </div>
        <div class = "planet-index" id="third-planet-index">
            <div class ="route">
                <a href ="team.html" class="person_name">
                <div class = "planet-container" id = "third-planet-container">
                <div class = "planet" id="third_planet"> Person 2</div>
                </div>
                  </a>
            </div>
        </div>
    </div>
    <div  background-color: goldenrod;><a class="store" href="index.php"> Purchase </a> </div>
</body>
</html>
