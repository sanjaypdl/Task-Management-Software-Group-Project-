<?php
include '../config/db.php';
$id = $_GET['id'];
$query = "SELECT * FROM tasks WHERE id = $id";
$result = mysqli_query($conn, $query);
$task = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];

    $query = "UPDATE tasks SET title='$title', description='$description', priority='$priority', status='$status' WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/validation.js"></script>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST" onsubmit="return validateTaskForm()">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $task['description']; ?></textarea>

        <label for="priority">Priority:</label>
        <select id="priority" name="priority">
            <option value="Low" <?php if($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
            <option value="Medium" <?php if($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
            <option value="High" <?php if($task['priority'] == 'High') echo 'selected'; ?>>High</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pending" <?php if($task['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="In Progress" <?php if($task['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
            <option value="Completed" <?php if($task['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
        </select>

        <input type="submit" value="Update Task">
    </form>
    <a href="../index.php">Back to Dashboard</a>
</body>
</html>
