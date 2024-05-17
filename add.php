<html>
    <body>
        <h2>Student Registration Form</h2>
        <form method="POST">
            First Name:
            <input type="text" name="firstname" required><br><br>
            Middle Name:
            <input type="text" name="middlename" required><br><br>
            Last Name:
            <input type="text" name="lastname" required><br><br>
            Suffix:
            <input type="text" name="suffix"><br><br>
            Course:
            <input type="text" name="course" required><br><br>
            Year and Section:
            <input type="text" name="year_section" required><br><br>
            <input type="submit" value="Add">
            <input type="reset" value="Clear">
            <a href="index.php"><input type="button" value="Back"></a>
        </form>

        <?php
            include 'db.php'; // Include db.php for database connection

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $firstname = $_POST['firstname'];
                $middlename = $_POST['middlename'];
                $lastname = $_POST['lastname'];
                $suffix = $_POST['suffix'];
                $course = $_POST['course'];
                $year_section = $_POST['year_section'];

                $sql = "INSERT INTO students (Firstname, Middlename, Lastname, Suffix, Course, `Year and Section`) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$course', '$year_section')";

                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </body>
</html>
