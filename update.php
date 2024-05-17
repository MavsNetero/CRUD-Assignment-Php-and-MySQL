<?php
    include 'db.php'; // Include db.php for database connection

    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM students WHERE `Student ID` = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $firstname = $row["Firstname"];
            $middlename = $row["Middlename"];
            $lastname = $row["Lastname"];
            $suffix = $row["Suffix"];
            $course = $row["Course"];
            $year_section = $row["Year and Section"];
        } else {
            echo "No student found with the given ID.";
            exit();
        }
    } else {
        echo "No ID provided.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $suffix = $_POST['suffix'];
        $course = $_POST['course'];
        $year_section = $_POST['year_section'];

        $sql = "UPDATE students SET Firstname='$firstname', Middlename='$middlename', Lastname='$lastname', Suffix='$suffix', Course='$course', `Year and Section`='$year_section' WHERE `Student ID` = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data updated successfully!');</script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form method="POST">
        Student Registration Form<br><br>
        <input type="hidden" name="id" value="<?php echo $id ?>"><br>
        First Name:
        <input type="text" name="firstname" value="<?php echo $firstname ?>" required><br><br>
        Middle Name:
        <input type="text" name="middlename" value="<?php echo $middlename ?>" required><br><br>
        Last Name:
        <input type="text" name="lastname" value="<?php echo $lastname ?>" required><br><br>
        Suffix:
        <input type="text" name="suffix" value="<?php echo $suffix ?>"><br><br>
        Course:
        <input type="text" name="course" value="<?php echo $course ?>" required><br><br>
        Year and Section:
        <input type="text" name="year_section" value="<?php echo $year_section ?>" required><br><br>
        <input type="submit" value="Update">
        <a href="index.php"><input type="button" value="Back"></a>
    </form>
</body>
</html>
