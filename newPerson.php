<?php
    $firstname = $lastname = "";
    $firstnameErr = $lastnameErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(test_input($_POST["firstname"])) || empty($_POST["firstname"])) {
            $firstnameErr = "First name is required.";
        }
        else {
            if(!preg_match('/^[a-zA-Z]+$/', test_input($_POST["firstname"]))) {
                $firstnameErr = "Names can only contain letters.";
            }
            else {
                $firstname = test_input($_POST["firstname"]);
                $firstnameErr = "";
            }
        }
        if (empty(test_input($_POST["lastname"])) || empty($_POST["lastname"])) {
            $lastnameErr = "Last name is required.";
        }
        else {
            if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["lastname"]))) {
                $lastnameErr = "Names can only contain letters.";
            }
            else {
                $lastname = test_input($_POST["lastname"]);
                $lastnameErr = "";
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
        <title>New Person</title>
    </head>
    <body>
        <div class="container">
            <p class="title">Adding a New Team Member</p>
            <div class = "menu1">
                <ul class = "menu_content"> 
                    <li><a id="account_name" class="link" href="team.html"> Team Java </a></li> <!-- Task: Add links -->
                    <li><a class= link href="frontpage.html">Front Page</a></li>
                    <li><a class="link" href="person1.html"> Person 1 </a></li>
                    <li><a id="sub_link"> Sub links </a></li>
                    <li><a id="sub_link"> Sub links </a></li>
                    <li><a id="sub_link"> Sub links </a></li>
                    <li><a class="link" href="person2.html"> Person 2 </a></li>
                    <li><a class="link" href="person3.html"> Person 3 </a></li>
                    <li><a class="link" href="person4.html"> Person 4 </a></li>
                    <li><a class="link" href="person5.html"> Person 5 </a></li>
                    <li><a class="link" href="person6.html"> Person 6 </a></li>
                    <li><a class="link" href="newPerson.php">Add New Team Member</a></li>
                    <li><a class="link" href="newTask.html">Add New Task</a></li>
                    <li><a class="link" href="progress_page.html"> Progress </a></li>
                    <li><a id="settings" href="settings.html"> Settings </a></li>
                </ul>
            </div>

        <form id="personForm" method="POST"
                action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <fieldset>
                <legend>Add New Team Member</legend>
                <div>
                    <label for="f-firstname">First Name: </label>
                    <input type="text" name="firstname" placeholder="First" id="f-firstname" />
                    <div class="span_wrapper">
                        <span class="error">* <?php echo $firstnameErr; ?></span>
                    </div>
                </div>
                <div>
                    <label for="f-lastname">Last Name: </label>
                    <input type="text" name="lastname" placeholder="Last" id="f-lastname" />
                    <span class="error">* <?php echo $lastnameErr; ?></span>
                </div>
                <div>
                    <input type="reset" value="Reset" />
                    <input type="submit" value="Submit"/>
                </div>
            </fieldset>
        </form>
        <p id="personJSONResult">Team Member Info</p>

        <script src="newPerson.js">
        </script>
</body>
</html>