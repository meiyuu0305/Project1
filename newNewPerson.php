

<!DOCTYPE html>
<html>
<body>
    <h1>newPerson form plus form validation from PHP</h1>
    <p>Check what $_SERVER["PHP_SELF"] returns<p>

    <?php echo $_SERVER["PHP_SELF"];?>

    <form method="POST"
                action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <fieldset>
                <legend>Add New Team Member</legend>
                <p>
                    <label for="f-firstname">First Name: </label>
                    <input type="text" name="firstname" placeholder="First" id="f-firstname" />
                    <span class="error">* <?php echo fnameErr;?></span>
                </p>
                
                <input type="submit" />
            </fieldset>
        </form>
        <p id="personJSONResult">Team Member Info</p>

        <script src="newPerson.js">
        </script>
</body>
</html>