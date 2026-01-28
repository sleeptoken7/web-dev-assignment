<?php
session_start(); // Start the session

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db.php';
    
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    
    $stmt = $conn->prepare("INSERT INTO tasks (task_name, task_description) VALUES (?, ?)");
    $stmt->bind_param("ss", $task_name, $task_description);
    $stmt->execute();
    
    // Redirect back to the main page after saving
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Create a New Task</h1>
        <form action="create.php" method="POST">
            <label for="task_name">Task Name:</label><br>
            <input type="text" name="task_name" id="task_name" required><br><br>
            
            <label for="task_description">Task Description:</label><br>
            <textarea name="task_description" id="task_description" rows="4"></textarea><br><br>
            
            <button type="submit" class="btn">Create Task</button>
        </form>
        <br>
        <a href="index.php">Back to Task List</a>
    </div>
</body>
</html>