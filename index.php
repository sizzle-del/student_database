<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Student Management System</title>
</head>
<body>
    <div class="container">
    <h2>Student Management System</h2>
    <a href="add.php" class="button">Add Student</a>


<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['course']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a> |
        <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete"
        onclick="return confirm('Are you sure you want to delete?');">
   Delete
</a>

    </td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
