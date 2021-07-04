<?php
include('connection.php');
error_reporting(0);
session_start();

function Drop_courses($s_id, $c_id)
{
 
  include('connection.php');


  $query = "DELETE from std_courses WHERE s_id='" . $s_id . "'AND c_id='" . $c_id . "'";
   mysqli_query($connection, $query);
   
  
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <title>Drop Courses</title>
 
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
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li><a href="transcript.php">Transcript</a></li>
          <li><a href="my_courses.php">My Courses</a></li>
          <li><a href="complaints.php">Complaint</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="select_courses.php" id="add"><span class="glyphicon glyphicon-pencil"></span> Add Courses</a></li>
        <li><a href="drop.php"><span class="glyphicon glyphicon-book"></span> Drop Courses</a></li>
          <li><a href="student_info.php"><span class="glyphicon glyphicon-user"></span> Student Info</a></li>
          <li><a href="index.php " ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <h2 align="center"><b>My Courses</b></h2>

  <form  method="POST">

    
    <table>
    <tr class="heading">
      <td><b>Course ID</b></td>
      <td><b>Course Name</b></td>
      <td><b>Course Cradit</b></td>
      <td><b></b></td>
    </tr>

<?php
    $query = "select *from courses as C inner join std_courses as SC on C.c_id=SC.c_id and SC.s_id='" . $_SESSION['info']['id'] . "'";
    $data = mysqli_query($connection, $query);
    $row = mysqli_num_rows($data);
    
    
    
    // Showing Courses
    $i = 1;
    for (; $i < $row; $i++) {
      $singleRecord = mysqli_fetch_assoc($data);
      
      echo '<tr class="myrow">' . '<td class="under_line">' . $singleRecord['c_id'] . '</td>'
      . '<td class="under_line">' . $singleRecord['c_name'] . '</td>'
      .'<td class="under_line">' . $singleRecord['cradits'] . '</td>'
      .'<td class="box">'.'<br>'.'<input type="checkbox" name='.$singleRecord['c_id'].'>'.'</br>'.'</td>'.'</tr>';
    }
    $singleRecord = mysqli_fetch_assoc($data);
    
    echo '<tr>' . '<td >' . $singleRecord['c_id'] . '</td>'
    . '<td >' . $singleRecord['c_name'] . '</td>'
    . '<td >' . $singleRecord['cradits'] . '</td>'
    .'<td class="box">'.'<br>'.'<input type="checkbox" name='.$singleRecord['c_id'].'>'.'</br>'.'</td>'.'</tr>';
?>
  </table>

  <input class="sbmt" type="submit" name="submit" id="sbmt" value="Confirm to Drop">
</form>
</body>

</html>

<?php
 
if(isset($_POST['submit']))
{

 
  if(!empty($_POST['1']))
      Drop_courses($_SESSION['info']['id'],1);
   if(!empty($_POST['2']))
   Drop_courses($_SESSION['info']['id'],2);
   if(!empty($_POST['3']))
   Drop_courses($_SESSION['info']['id'],3);
  if(!empty($_POST['4']))
  Drop_courses($_SESSION['info']['id'],4);
   if(!empty($_POST['5']))
   Drop_courses($_SESSION['info']['id'],5);
   

}



?>