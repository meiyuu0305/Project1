<!-- file for form to add new person to team -->
<?php
        //define variables to match inputs
        $first_name = $last_name = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //define variables for error messages
        $fnameErr = $lnameErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
                $fnameErr = "First name is required";
            }
            else {
                $first_name = test_input($_POST["firstname"]);
                if(!preg_match("/^[a-zA-Z- ]*$/", $first_name)) {
                    $fnameErr = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["lastname"])) {
                $lnameErr = "Last name is required";
            }
            else {
                $last_name = test_input($_POST["lastname"]);
                if(!preg_match("/^[a-zA-Z- ]*$/", $first_name)) {
                    $fnameErr = "Only letters and white space allowed";
                }
            }
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
                    <li><a class="link" href="newPerson.html">Add New Team Member</a></li>
                    <li><a class="link" href="newTask.html">Add New Task</a></li>
                    <li><a class="link" href="progress_page.html"> Progress </a></li>
                    <li><a id="settings" href="settings.html"> Settings </a></li>
                </ul>
            </div>
        

        <form method="POST"
                action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <fieldset>
                <legend>Add New Team Member</legend>
                <p>
                    <label for="f-firstname">First Name: </label>
                    <input type="text" name="firstname" placeholder="First" id="f-firstname" />
                    <span class="error">* <?php echo fnameErr;?></span>
                </p>
                <p>
                    <label for="f-lastname">Last Name: </label>
                    <input type="text" name="lastname" placeholder="Last" id="f-lastname" />
                    <span class="error">* <?php echo lnameErr;?></span>
                </p>
                <input type="reset" />
                <input type="submit" />
            </fieldset>
        </form>
        <p id="personJSONResult">Team Member Info</p>

        <script src="newPerson.js">
        </script>

        
    </body>
</html>
