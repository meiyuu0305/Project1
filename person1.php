<!-- first person file -->

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

<html class="person">
    <head>
        <link rel="stylesheet" media='screen and (max-width: 480px)' href="mobile-style.css">
        <link rel="stylesheet" media="screen and (min-width: 481px) and (max-width: 768px)" href="tablet-style.css">
        <link rel="stylesheet" media="screen and (min-width: 769px)" href="desktop-style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
        <title>Person 1</title>
    </head>
    <body>
        <div class="container">
            <p class="title">Person 1's Tasks</p>
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
                    <li><a class="link" href="progress_page.php"> Progress </a></li>
                    <li><a id="settings" href="settings.html"> Settings </a></li>
                    <li><a class="link" href="logout.php">Log Out </a><li></li>
                </ul>
            </div>
            <div class="toDo item">
                <table>
                    <caption>TO DO:</caption>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Task</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CS 315 project</td>
                            <td>newPerson html file</td>
                            <td>11/03/2023</td>
                        </tr>
                        <tr>
                            <td>CS 315 project</td>
                            <td>newTask html file</td>
                            <td>11/05/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="inProg item">
                    <table>
                    <caption>IN PROGRESS:</caption>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Task</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CS 315 project</td>
                            <td>person html file styling</td>
                            <td>11/03/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="done item">
                <table>
                    <caption>FINISHED:</caption>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Task</th>
                            <th>Due Date</th>
                            <th>Date Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CS 315 project</td>
                            <td>person1 html file structure</td>
                            <td>11/03/2023</td>
                            <td>11/02/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
