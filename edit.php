<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red; text-align:center;'>Invalid email format</p>";
    } else {
        $query = "UPDATE students 
                  SET name='$name', email='$email', course='$course' 
                  WHERE id=$id";
        mysqli_query($conn, $query);
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Course: <input type="text" name="course" value="<?php echo $row['course']; ?>"><br><br>
    <button name="update">Update</button>
</form>

</body>
</html>
