<?php

require_once "db.php";

function addTask($task, $assignee, $deadline) {
    global $conn;

    $sql = "INSERT INTO tasks (task, assignee, deadline) VALUES ('$task', '$assignee', '$deadline')";
    $result = $conn->query($sql);

    return $result;
}

function markTaskAsCompleted($taskId) {
    global $conn;

    $sql = "UPDATE tasks SET completed = 1 WHERE id = $taskId";
    $result = $conn->query($sql);

    return $result;
}

function getTasks() {
    global $conn;

    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    $tasks = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }

    return $tasks;
}

?>
