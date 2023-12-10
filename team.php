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
    <title>Team Management</title>
</head>
<body style="display: flex;">
    <div class = "menu1">
        <ul class = "menu_content"> 
            <li><a id="account_name" class="link" href="team.php"> Team Java </a></li> <!-- Task: Add links -->
            <li><a class= link href="frontpage.php">Front Page</a></li>
            <li><a class="link" href="person1.php"> Person 1 </a></li>
            <li><a id="sub_link"> Sub links </a></li>
            <li><a id="sub_link"> Sub links </a></li>
            <li><a id="sub_link"> Sub links </a></li>
            <li><a class="link" href="person2.php"> Person 2 </a></li>
            <li><a class="link" href="person3.php"> Person 3 </a></li>
            <li><a class="link" href="person4.php"> Person 4 </a></li>
            <li><a class="link" href="person5.php"> Person 5 </a></li>
            <li><a class="link" href="person6.php"> Person 6 </a></li>
            <li><a class="link" href="newNewPerson.php">Add New Team Member</a></li>
            <li><a class="link" href="newNewTask.php">Add New Task</a></li>
            <li><a id="settings" href="settings.html"> Settings </a></li>
            <li><a class="link" href="logout.php">Log Out </a><li></li>
        </ul>
    </div> 
    
    <div class = "container_task_page" > 
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 1</p>
            <input type="text" name="person1" placeholder="Your task..">
        </form>
    </div>
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 2</p>
            <input type="text" name="person2" placeholder="Your task..">
        </form>
    </div>
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 3</p>
            <input type="text" name="person3" placeholder="Your task..">
        </form>
    </div>
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 4</p>
            <input type="text" name="person4" placeholder="Your task..">
        </form>
    </div>
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 5</p>
            <input type="text" name="person5" placeholder="Your task..">
        </form>
    </div>
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 6</p>
            <input type="text" name="person6" placeholder="Your task..">
        </form>
    </div>
    <div class = "task_widget">
        <form>
            <p class = "heading">Person 7</p>
            <input type="text" name="person7" placeholder="Your task..">
        </form>
    </div>
    
    </div>
    </div>
    
</body>
</html>
