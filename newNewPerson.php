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
        echo "$firstname <br> $lastname <br> $firstnameErr <br> $lastnameErr";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html>
<body>
    <h1>newPerson form plus form validation from PHP</h1>

    <form id="personForm" method="POST"
                action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <fieldset>
                <legend>Add New Team Member</legend>
                <div>
                    <label for="f-firstname">First Name: </label>
                    <input type="text" name="firstname" placeholder="First" id="f-firstname" />
                    <span>* <?php echo $firstnameErr; ?></span>
                </div>
                <div>
                    <label for="f-lastname">Last Name: </label>
                    <input type="text" name="lastname" placeholder="Last" id="f-lastname" />
                    <span>* <?php echo $lastnameErr; ?></span>
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