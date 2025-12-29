<?php include 'db.php'; ?>

<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red; text-align:center;'>Invalid email format</p>";
    } else {
        $query = "INSERT INTO students (name, email, course)
                  VALUES ('$name', '$email', '$course')";
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
    <title>Add Student</title>
</head>
<body>

<h2>Add Student</h2>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    <button name="submit">Add</button>
</form>

</body>
</html>
