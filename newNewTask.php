<?php

    //initialize session
    session_start();
    //check if user is logged in
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }

    $task = $dueDate = $assignedMember = "";
    $taskErr = $dueDateErr = $assignedMemberErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["task"]) || empty(trim($_POST["task"]))) {
            $taskErr = "Task description is required.";
        }
        else {
            if (!preg_match('/^[a-zA-Z0-9\s]+$/', test_input($_POST["task"]))) {
                $taskErr = "Task description should only contain letters and numbers.";
            }
            else {
                $task = test_input($task);
                $taskErr = "";
            }
        }
        if (empty($_POST["duedate"])) {
            $dueDateErr = "Due date is required.";
        }
        else {
            /*if (!preg_match('/^[0-9-]+$/', $dueDate)) {
                $dueDateErr = "Due date must only include numbers and hyphens.";
            }
            else {*/
            $dueDateErr = "";
            //}
        }
        if (empty($_POST["assignedMember"]) || empty(trim($_POST["assignedMember"]))) {
            $assignedMemberErr = "A team member must be assigned to the task.";
        }
        else {
            if (!preg_match('/^[a-zA-Z\s]+$/', trim($_POST["assignedMember"]))) {
                $assignedMemberErr = "Team member name should only contain letters.";
            }
            else {
                $assignedMember = htmlspecialchars(stripslashes(($_POST["assignedMember"])));
                $assignedMemberErr = "";
            }
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>

<html class="form">

    <head>
        <link rel="stylesheet" media='screen and (max-width: 480px)' href="mobile-style.css">
        <link rel="stylesheet" media="screen and (min-width: 481px) and (max-width: 768px)" href="tablet-style.css">
        <link rel="stylesheet" media="screen and (min-width: 769px)" href="desktop-style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
        <title>New Task</title>
    </head>
    <body>
        <div class="container">
            <p class="title">Adding a New Task</p>
            <div class = "menu1">
                <ul class = "menu_content">
                    <li><a id="account_name" class="link" href="team.php"> Team Java </a></li> <!-- Task: Add links -->
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
                    <li><a class="link" href="newNewPerson.php">Add New Team Member</a></li>
                    <li><a class="link" href="newNewTask.php">Add New Task</a></li>
                    <li><a class="link" href="progress_page.php"> Progress </a></li>
                    
                    <li><a class="link" href="logout.php">Log Out </a><li>
                </ul>
            </div>

        <form id="taskForm" method="post">
            <fieldset>
                <legend>Add New Task:</legend>
                <div>
                    <label for="f-task">Task: </label>
                    <input type="text" name="task" id="f-task" placeholder="Enter task name here..."/>
                    <span class="error">* <?php echo $taskErr; ?></span>
                </div>
                <div>
                    <label for="f-dueDate">Due Date: </label>
                    <input type="date" name="duedate" id="f-dueDate"/>
                    <span class="error">* <?php echo $dueDateErr; ?></span>
                </div>
                <div>
                    <label for="f-teamMember">Assigned Team Member: </label>
                    <input type="text" name="assignedMember" id="f-teamMember" placeholder="First and last name"/>
                    <span class="error">* <?php echo $assignedMemberErr; ?></span>
                </div>
                <div>
                    <input type="reset" />
                    <input type="submit" />
                </div>
            </fieldset>
        </form>
        <!-- id="taskJSONResult">Task Information-->
        <script src="newTask.js">
        </script>
    </body>
</html>