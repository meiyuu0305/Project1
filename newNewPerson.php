<?php
    $firstname = $lastname = "";
    $fnameErr = $lnameErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["firstname"])) {
            $fnameErr = "First name is required.";
            echo "$fnameErr";
        }
        else {
            $firstname = test_input($_POST["firstname"]);
        }
        $lastname = test_input($_POST["lastname"]);
        echo "$firstname <br> $lastname";
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
    <p>Check what $_SERVER["PHP_SELF"] returns<p>

    <?php echo $_SERVER["PHP_SELF"];?>

    <form id="personForm" method="POST"
                action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <fieldset>
                <legend>Add New Team Member</legend>
                <div>
                    <label for="f-firstname">First Name: </label>
                    <input type="text" name="firstname" placeholder="First" id="f-firstname" />
                </div>
                <div>
                    <label for="f-lastname">Last Name: </label>
                    <input type="text" name="lastname" placeholder="Last" id="f-lastname" />
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