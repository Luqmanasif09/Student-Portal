<!--NOT WORKING-->


<?php
include('connection.php');
session_start(); // getting Student ID during login using session variable
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaint Box</title>

  <link rel="stylesheet" href="Comp.css">

  <!--CDN links for Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="background:#f8f1f1;">

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
            <!--Session variable used for Student id-->

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
          <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <form action="" method="POST" >
    <div class="Page5">
      <input type="text" placeholder="Name" name="name" required>
      <input type="text" placeholder="Email" name="Mail" required>
      <h4>Complaint Box</h4>
      <textarea name="Comp" id="" cols="30" rows="10" required></textarea>

      <input type="submit" id="btn" name="submit" >
    </div>
  </form>
</body>

</html>

<?php
 echo'<h1>'."PHP run".'</h1>';
 echo $_SESSION['info']['id'];
if (isset($_POST['submit']))
{
  echo'<h1>'."in if".'</h1>';
  if (!empty($_POST['name']) && !empty($_POST['Mail'])&&!empty($_POST['Comp']))
  {
    echo'<h1>'."in inner if".'</h1>';
    $data = "INSERT INTO complain_box VALUES(NULL,'".$_SESSION['info']['id']."','".$_POST['name']."','".$_POST['Mail']."','".$_POST['Comp']."',NULL)";
    $query=mysqli_query($connection,$data);
    if($query)
    {
      echo '<script type="text/JavaScript">  
      alert("Complaint has been Forward "); 
      </script>';
    }
    else
    {
      echo '<script type="text/JavaScript">  
      alert("Something went wrong "); 
      </script>';
    }

  }
}
?>