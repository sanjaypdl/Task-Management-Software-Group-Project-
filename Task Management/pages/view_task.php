<?php
include '../config/db.php';
$id = $_GET['id'];
$query = "SELECT * FROM tasks WHERE id = $id";
$result = mysqli_query($conn, $query);
$task = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Task</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>View Task</h1>
    <p><strong>Title:</strong> <?php echo $task['title']; ?></p>
    <p><strong>Description:</strong> <?php echo $task['description']; ?></p>
    <p><strong>Priority:</strong> <?php echo $task['priority']; ?></p>
    <p><strong>Status:</strong> <?php echo $task['status']; ?></p>
    <a href="../index.php">Back to Dashboard</a>
</body>
</html>
