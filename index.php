<?php
    include 'db.php'; // Include db.php for database connection

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Registered Students</h2>
    <a href="add.php"><button>Add</button></a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Suffix</th>
            <th>Course</th>
            <th>Year and Section</th>
            <th>Action</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Student ID'] . "</td>";
                echo "<td>" . $row['Firstname'] . "</td>";
                echo "<td>" . $row['Middlename'] . "</td>";
                echo "<td>" . $row['Lastname'] . "</td>";
                echo "<td>" . $row['Suffix'] . "</td>";
                echo "<td>" . $row['Course'] . "</td>";
                echo "<td>" . $row['Year and Section'] . "</td>";
                echo "<td>";
                echo "<a href='delete.php?id=" . $row['Student ID'] . "'><button>Delete</button></a>";
                echo "<a href='update.php?id=" . $row['Student ID'] . "'><button>Update</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
