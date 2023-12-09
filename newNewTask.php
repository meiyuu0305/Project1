<?php

    $task = $dueDate = $assignedMember = "";
    $taskErr = $dueDateErr = $assignedMemberErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["task"]) || empty(trim($_POST["task"]))) {
            $taskErr = "Task description is required.";
        }
        else {
            if (!preg_match('/^[a-zA-Z0-9]+$/', test_input(trim($_POST["task"])))) {
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
            if (!test_date($dueDate)) {
                $dueDateErr = "Due date must be in format 'YYYY-MM-DD'.";
            }
            else {
                $dueDate = htmlspecialchars($dueDate);
                $dueDateErr = "";
            }
        }
        if (empty($_POST["assignedMember"]) || empty(trim($_POST["assignedMember"]))) {
            $assignedMemberErr = "A team member must be assigned to the task.";
        }
        else {
            if (!preg_match('/^[a-zA-Z]+$/', test_input(trim($_POST["task"])))) {
                $assignedMemberErr = "Team member name should only contain letters.";
            }
            else {
                $assignedMember = test_input($_POST["assignedMember"]);
                $assignedMemberErr = "";
            }
        }
    }


    function test_input($data) {
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //date validation technique comes from https://www.codexworld.com/how-to/validate-date-input-string-in-php/
    function test_date($date, $format = "Y-m-d") {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

?>

<!DOCTYPE html>

<html class="form">

        <form id="taskForm" method="post">
            <fieldset>
                <legend>Add New Task:</legend>
                <p>
                    <label for="f-task">Task: </label>
                    <input type="text" name="task" id="f-task" placeholder="Enter task name here..."/>
                </p>
                <p>
                    <label for="f-dueDate">Due Date: </label>
                    <input type="date" name="duedate" id="f-dueDate"/>
                </p>
                <p>
                    <label for="f-teamMember">Assigned Team Member: </label>
                    <input type="text" name="assignedMember" id="f-teamMember" placeholder="First and last name"/>
                </p>
                <input type="reset" />
                <input type="submit" />
            </fieldset>
        </form>
        <p id="taskJSONResult">Task Information</p>
        <script src="newTask.js">
        </script>

</html>