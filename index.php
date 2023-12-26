<?php

require_once "tasks.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addTask"])) {
        $task = $_POST["task"];
        $assignee = $_POST["assignee"];
        $deadline = $_POST["deadline"];

        addTask($task, $assignee, $deadline);
    } elseif (isset($_POST["completeTask"])) {
        $taskId = $_POST["taskId"];
        markTaskAsCompleted($taskId);
    }
}

$tasks = getTasks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Task Management System</title>
</head>
<body>
    <div class="container">
        <h1>Task Management System</h1>
        <form id="taskForm">
            <label for="task">Task:</label>
            <input type="text" id="task" name="task" required>

            <label for="assignee">Assignee:</label>
            <input type="text" id="assignee" name="assignee" required>

            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" required>

            <button type="submit">Add Task</button>
        </form>

        <div id="taskList">
            <!-- Tasks will be displayed here -->
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
