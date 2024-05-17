<?php
    include 'db.php'; // Include db.php for database connection

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM students WHERE `Student ID` = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Successfully Deleted.")</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo '<script>alert("Deletion Failed.")</script>';
    }

    echo "<script>window.location = 'index.php';</script>";
    exit();

    mysqli_close($conn);
?>
