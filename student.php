<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Box</title>

    <style>
        td,
        tr,
        th {
            width: 5%;
        }

        body {
            background-color: lightblue;
        }

        table {
            border: 8px solid black;
            border-spacing: 0px;
            margin-right: 5px;
            width: 100%;
            border-radius: 20px;
            padding: 5px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Student Info</h2>
    <table>
        <td><br> <b>Student ID</b></br></td>
        <td><br> <b>Student Name</b></br></td>
        <td><br> <b>Father Name</b> </br></td>
        <td><br> <b>Email</b></br></td>
        <td><br> <b>Phone</b></br></td>
        <td><br> <b>Institution</b></br></td>
        <td><br> <b>Gender</b> </br></td>
        <td><br> <b>Country</b> </br></td>
        <td><br> <b>Date of Birth</b></br></td>
        <td><br> <b>Student Credits</b></br></td>
        <td><br> <b>Student Grade</b></br></td>


       
            <?php
            $query = "select *from courses";
            $data = mysqli_query($connection, $query);
            $information = mysqli_fetch_all($data, MYSQLI_ASSOC);
            // get number of rows of the table in the database
            foreach ($information as $singleRecord) {
                echo '<tr>' . '<td style="border: 1px solid black">' . $singleRecord['c_id'] . '</td>'
                    . '<td style="border: 1px solid black">' . $singleRecord['c_name'] . '</td>'
                    . '<td style="border: 1px solid black">' . $singleRecord['gpa'] . '</td>'
                    . '<td style="border: 1px solid black">' . $singleRecord['grade'] . '</td>' . '</tr>';
            }
            ?>
    </table>
</body>

</html>