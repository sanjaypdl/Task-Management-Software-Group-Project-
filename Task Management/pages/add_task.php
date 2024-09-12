<?php
include '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    $query = "INSERT INTO tasks (title, description, priority) VALUES ('$title', '$description', '$priority')";
    mysqli_query($conn, $query);
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Task</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/validation.js"></script>
</head>
<body>
    <h1>Add New Task</h1>
    <form method="POST" onsubmit="return validateTaskForm()">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="priority">Priority:</label>
        <select id="priority" name="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <input type="submit" value="Add Task">
    </form>
    <a href="../index.php">Back to Dashboard</a>
</body>
</html>
