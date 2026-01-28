<?php
session_start(); // Start the session

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

require_once 'db.php';

// Handle the form submission for UPDATE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    
    $stmt = $conn->prepare("UPDATE tasks SET task_name=?, task_description=? WHERE id=?");
    $stmt->bind_param("ssi", $task_name, $task_description, $id);
    $stmt->execute();
    
    header("Location: index.php");
    exit();
}

// Fetch the existing task data to pre-fill the form
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$task = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            
            <label for="task_name">Task Name:</label><br>
            <input type="text" name="task_name" id="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>" required><br><br>
            
            <label for="task_description">Task Description:</label><br>
            <textarea name="task_description" id="task_description" rows="4"><?php echo htmlspecialchars($task['task_description']); ?></textarea><br><br>
            
            <button type="submit" class="btn">Update Task</button>
        </form>
        <br>
        <a href="index.php">Back to Task List</a>
    </div>
</body>
</html>