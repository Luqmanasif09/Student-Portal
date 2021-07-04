<?php
include('connection.php');
session_start();
//$my_courses=array(0,0,0,0,0);
$_SESSION['my_c']=0;//$my_courses;



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

    .btn {

      background-color: DodgerBlue;
      border: none;
      color: white;
      margin-bottom: 5px;
      font-size: 8px;
     

    }

    .btn_minus {

      background-color: red;
      border: none;
      color: white;
      margin-bottom: 5px;
      font-size: 8px;

    }
  </style>

  <script type="text/javascript">
  
  $( 

    function() 
    {
      var flag=true;
      $("#btn1").click(

        function() {

          if (flag) {
            alert("if");
            $("#btn1").removeClass("btn");
            $("#btn1").addClass("btn_minus");

            $("#i1").removeClass("glyphicon glyphicon-plus");
            $("#i1").addClass("glyphicon glyphicon-minus");
            "<?php echo $_SESSION['my_c']=1;?>";
            flag = false;
          }
          else
          {
            alert("else");
            $("#btn1").removeClass("btn_minus");
            $("#btn1").addClass("btn");
                        

            $("#i1").removeClass("glyphicon glyphicon-minus");
            $("#i1").addClass("glyphicon glyphicon-plus");

           
            flag = true;
           
          }
          if(!flag)
          {
            alert("in");
            var x="<?php echo'<h1>'.$_SESSION['my_c'].'</h1>';  ?> "; 
            alert(x);
          }

        }
      );
    }
  );
  </script>



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
        <li><a href="#"><span class="glyphicon glyphicon-book"></span> Add Courses</a></li>
        <li><a href="student_info.php"><span class="glyphicon glyphicon-user"></span> Student Info</a></li>
        <li><a href="log in.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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

    <tr class="myrow">
      <td><br> <b>1</b></br> </td>
      <td><br> <b>ITC</b> </br></td>
      <td><br> <b>3</b></br> </td>
      <td><br> <button  class="btn" id="btn1" name="btn1"><span id="i1" class="glyphicon glyphicon-plus"></span></button></br></td>

    
    </tr>


    <tr class="myrow">
      <td><br> <b>2</b></br> </td>
      <td><br> <b>PF</b> </br></td>
      <td><br> <b>4</b></br> </td>
      <td><br> <button class="btn" name="2" id="2"  ><i id="i2" class="fa fa-plus"></i></button></br></td>
    </tr>

    <tr class="myrow">
      <td><br> <b>3</b></br> </td>
      <td><br> <b>WAD</b> </br></td>
      <td><br> <b>3</b></br> </td>
      <td><br> <button class="btn" name="3"id="3"><i id="i3" class="fa fa-plus"></i></button></br></td>
    </tr>

    <tr class="myrow">
      <td><br> <b>4</b></br> </td>
      <td><br> <b>ISD</b> </br></td>
      <td><br> <b>3</b></br> </td>
      <td><br> <button class="btn" name="4" id="4"><i id="i4" class="fa fa-plus"></i></button></br></td>
    </tr>


    <tr>
      <td><br> <b>5</b></br> </td>
      <td><br> <b>ISL</b> </br></td>
      <td><br> <b>2</b></br> </td>
      <td><br> <button class="btn" name="5" id="5"><i id="i5" class="fa fa-plus"></i></button></br></td>
    </tr>

  </table>
</body>





</html>