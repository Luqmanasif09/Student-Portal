<?php
include('connection.php');
session_start();


function Insert_courses($s_id, $c_id)
{
 
  include('connection.php');
  $query = "SELECT * from std_courses WHERE s_id='" . $s_id . "'AND c_id='" . $c_id . "'";
  $Check = mysqli_query($connection, $query);
  $Data = mysqli_num_rows($Check);
  if (!$Data) {
    $query = "INSERT INTO std_courses VALUES('$s_id','$c_id','0','0','0.0','-','0',NULL)";
    mysqli_query($connection, $query);
  } 
  else
  {
    echo '<script type="text/JavaScript">  
    alert("Some Courses Already Selected"); 
    </script>';
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 

  <title>Course Registration</title>
  <style>
    body {
      background-color: #214151;
    }

    .heading {
      border-bottom: 5px solid black;

    }

    .myrow {
      width: 20%;
      text-align: center;
      border-bottom: 2px solid black;
      
    }

    button {
      margin-bottom: 5px;
      margin-right: 5px;
    }

    table {
      background-color: #a2d0c1;
      text-align: center;
      margin-left: 35%;
      width: 30%;
      border-radius: 5px;  
    }
    h2{
      text-align: center;
      color: #ffcc29;
      padding-bottom: 20px;

    }

    input[type=checkbox] { 
            width: 20px; 
            height: 20px; 
            margin-right: 5px;
            color: red;
        } 

   
    .sbmt{
      /* margin-left: 44%;
      margin-top: 15px;
      width: 10%;
     
    float: left;
    color: darkgoldenrod; */
    width: 20%;
    margin-left: 40%;
    box-sizing: border-box;
    padding: 10px 0;
    margin-top: 30px;
    border: none;
    background: wheat;
    opacity: 0.8;
    border-radius: 20px;
    font-size: 20px;
    color: red;
    
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
      <ul class="nav navbar-nav">
        <li><a href="transcript.php">Transcript</a></li>
        <li><a href="my_courses.php">My Courses</a></li>
        <li><a href="complaints.php">Complaint</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="add"><span class="glyphicon glyphicon-pencil"></span> Add Courses</a></li>
        <li><a href="drop.php"><span class="glyphicon glyphicon-book"></span> Drop Courses</a></li>
        <li><a href="student_info.php"><span class="glyphicon glyphicon-user"></span> Student Info</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <h2 >Select Courses</h2>
  <table>

    <tr class="heading">
      <td><b>Course ID</b></td>
      <td><b>Course Name</b></td>
      <td><b>Course Cradit</b></td>
      <td><b></b></td>
    </tr>

  <form action="" method="POST">
  
    <tr class="myrow">
      <td><br> <b>1</b></br> </td>
      <td><br> <b>ITC</b> </br></td>
      <td><br> <b>3</b></br> </td>
      <td><br> <input type="checkbox"  id="1"  name="1"></br></td>
    </tr>


    <tr class="myrow">
      <td><br> <b>2</b></br> </td>
      <td><br> <b>PF</b> </br></td>
      <td><br> <b>4</b></br> </td>
      <td><br> <input type="checkbox"  id="2"  name="2"></br></td>
      </tr>

    <tr class="myrow">
      <td><br> <b>3</b></br> </td>
      <td><br> <b>WAD</b> </br></td>
      <td><br> <b>3</b></br> </td>
      <td><br> <input type="checkbox"  id="3"  name="3"></br></td>
    </tr>

    <tr class="myrow">
      <td><br> <b>4</b></br> </td>
      <td><br> <b>ISD</b> </br></td>
      <td><br> <b>3</b></br> </td>
      <td><br> <input type="checkbox"  id="4"  name="4"></br></td>
    </tr>


    <tr>
      <td><br> <b>5</b></br> </td>
      <td><br> <b>ISL</b> </br></td>
      <td><br> <b>2</b></br> </td>
      <td><br> <input type="checkbox"  id="5"  name="5"></br></td>   
      </tr>

  </table>

    <input class="sbmt" type="submit" name="submit" id="sbmt" value="Confirm Registration">
  </form>

</body>
</html>

<?php

if(isset($_POST['submit']))
{


  if(!empty($_POST['1']))
      Insert_courses($_SESSION['info']['id'],1);
   if(!empty($_POST['2']))
     Insert_courses($_SESSION['info']['id'],2);
   if(!empty($_POST['3']))
     Insert_courses($_SESSION['info']['id'],3);
  if(!empty($_POST['4']))
    Insert_courses($_SESSION['info']['id'],4);
   if(!empty($_POST['5']))
    Insert_courses($_SESSION['info']['id'],5);
  
    
}
 

?>