<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
  <style>
    body {
      background-color: #23689b;
    }

    .under_line_head {
      border-bottom: 4px solid black;
      text-align: center;

    }

    .under_line {
      border-bottom: 1px solid black;
      text-align: center;

    }

    tr {

      height: 50px;

    }

    table {

      background-color: #d9dab0;
      text-align: center;

      margin-left: 35%;
      width: 30%;
      border-radius: 20px;

    }

    h2 {
      margin-bottom: 40px;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="portal.php">
          <h4 style="color:white; padding-right: 25px;margin: 1px;">
            <?php echo $_SESSION['info']['User_Name']; ?>

          </h4>

        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li><a href="transcript.php">Transcript</a></li>
          <li><a href="#">My Courses</a></li>
          <li><a href="complaints.php">Complaint</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="select_courses.php" id="add"><span class="glyphicon glyphicon-pencil"></span> Add Courses</a></li>
        <li><a href="drop.php"><span class="glyphicon glyphicon-book"></span> Drop Courses</a></li>
          
          <li><a href="student_info.php"><span class="glyphicon glyphicon-user"></span> Student Info</a></li>
          <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <h2 align="center"><b>My Courses</b></h2>
  <table>
    <td class="under_line_head"><br> <b>Course ID</b></br>
    </td>
    <td class="under_line_head"><br> <b>Course Name</b>
      </br>
    </td>
    <td class="under_line_head"><br> <b>Course Credits</b></br>
    </td>

    <?php
    $query = "select *from courses as C inner join std_courses as SC on C.c_id=SC.c_id and SC.s_id='" . $_SESSION['info']['id'] . "'";
    $data = mysqli_query($connection, $query);
    $row = mysqli_num_rows($data);



    // Showing Courses
    for ($i = 0; $i < $row - 1; $i++) {
      $singleRecord = mysqli_fetch_assoc($data);

      echo '<tr>' . '<td class="under_line">' . $singleRecord['c_id'] . '</td>'
        . '<td class="under_line">' . $singleRecord['c_name'] . '</td>'
        . '<td class="under_line">' . $singleRecord['cradits'] . '</td>' . '</tr>';
    }
    $singleRecord = mysqli_fetch_assoc($data);

    echo '<tr>' . '<td >' . $singleRecord['c_id'] . '</td>'
      . '<td >' . $singleRecord['c_name'] . '</td>'
      . '<td >' . $singleRecord['cradits'] . '</td>' . '</tr>';
    ?>
  </table>
</body>

</html>