<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap CDN links-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Transcript</title>

  <style>
    body {
      background-color: #23689b;
    }

    .under_line_head {
      border-bottom: 4px solid black;
      text-align: center;
    }

    tr {
      height: 50px;
    }

    table {
      background-color: #d9dab0;
      text-align: center;
      margin-left: 31%;
      width: 40%;
      border-radius: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
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
          <li><a href="#">Transcript</a></li>
          <li><a href="my_courses.php">My Courses</a></li>
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

  <h2>Transcript</h2>
  <table>
    <td class="under_line_head"><br> <b>Course ID</b></br> </td>
    <td class="under_line_head"><br> <b>Course Name</b> </br></td>
    <td class="under_line_head"><br> <b>Course Credits</b></br> </td>
    <td class="under_line_head"><br> <b>Grade</b></br> </td>

    <td class="under_line_head"><br> <b>CGPA</b></br> </td>
    <td class="under_line_head"><br> <b>Attendance</b></br></td>


    <?php

    function calculate_grade($Marks, $T_marks) // function for Grade Calculation
    {
      if ($T_marks == 0)
        return "-";
      $percent = ($Marks * 100) / $T_marks;
      $grade = "-";
      if ($percent >= 86)
        $grade = 'A';
      else if ($percent >= 75)
        $grade = 'B+';
      else if ($percent >= 70)
        $grade = 'B';
      else if ($percent >= 60)
        $grade = 'C';
      else if ($percent >= 50)
        $grade = 'P';
      else
        $grade = 'F';
      return $grade;
    }

    // query to check valid Student Courses using Inner join
    $query = "select C.c_id,C.c_name,C.cradits,SC.marks,SC.T_marks,SC.cgpa,SC.grade,SC.abscent from courses as C inner join std_courses as SC on SC.s_id='" . $_SESSION['info']['id'] . "' and C.c_id=SC.c_id";
    $data = mysqli_query($connection, $query);
    $info = mysqli_fetch_all($data, MYSQLI_ASSOC);



    foreach ($info as $singleRecord) {
      $c_id = $singleRecord['c_id'];
      $Marks = $singleRecord['marks'];
      $T_marks = $singleRecord['T_marks'];
      $grade = calculate_grade($Marks, $T_marks);

      //Setting student Grade in DataBase: Portal Table: Std_courses
      $query_for_grade = "UPDATE std_courses SET grade='$grade' WHERE s_id='" . $_SESSION['info']['id'] . "' AND c_id='" . $c_id . "'";
      $data = mysqli_query($connection, $query_for_grade);

      //Displaying Transcript
      echo '<tr>' . '<td  >' . $singleRecord['c_id'] . '</td>'
        . '<td >' . $singleRecord['c_name'] . '</td>'
        . '<td >' . $singleRecord['cradits'] . '</td>'
        . '<td >' . $singleRecord['grade'] . '</td>'
        . '<td >' . $singleRecord['abscent'] . '</td>'
        . '<td >' . $singleRecord['cgpa'] . '</td>';
    }
    ?>
  </table>
</body>

</html>