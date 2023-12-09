<?php

    $task = $dueDate = $assignedMember = "";
    $taskErr = $dueDateErr = $assignedMemberErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["task"]) || empty(trim($_POST["task"]))) {
            $taskErr = "Task description is required.";
        }
        else {
            if(!preg_match('/^[a-zA-Z0-9]+$/', test_input($_POST["task"]))) {
                $taskErr = "Task description should only contain letters and numbers.";
            }
            else {
                $task = htmlspecialchars(stripslashes($task));
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
        //if (empty($_POST["assignedMember"]))
    }


    function test_input($data) {
        $data = trim($data);
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