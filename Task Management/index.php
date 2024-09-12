<?php
include 'config/db.php';
$query = "SELECT * FROM tasks ORDER BY priority DESC, created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Management Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Task Management System</h1>
    <a href="pages/add_task.php">Add New Task</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($task = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $task['title']; ?></td>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $task['priority']; ?></td>
                <td><?php echo $task['status']; ?></td>
                <td>
                    <a href="pages/view_task.php?id=<?php echo $task['id']; ?>">View</a>
                    <a href="pages/edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                    <a href="pages/delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
