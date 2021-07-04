<?php

include('connection.php');
//  error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/style2.css">
  <title>Sign In</title>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     
      <ul class="nav navbar-nav navbar-left">
     
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Student Portal</a></li>
      
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="sign up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
  <div class="Page">
    <h2> Sign In </h2>
    <form action="" method="POST" autocomplete="off">
      <input type="text" placeholder="Phone or Email" name="phone_email" required>
      <input type="password" placeholder="Password" name="pass" required>
      <input type="submit" name="submit">
    </form>

    <div class="Button">
      <input type="checkbox" name="remember" checked="checked">Remember me
      <a href="reset_pass.php">Forgot Password</a>
    </div>
  </div>

</body>

</html>

<?php

session_start();

if (isset($_POST['submit'])) {

  $phone_or_email = $_POST['phone_email'];
  $password = $_POST['pass'];

  if (!empty($phone_or_email) && !empty($password)) {

    $query = "SELECT id,User_Name from register WHERE (Email='" . $phone_or_email . "'OR Phone_No='" . $phone_or_email . "')AND Password='" . $password . "'";
    $Check = mysqli_query($connection, $query);
    $Data = mysqli_fetch_assoc($Check);
    if (isset($Data)) {

      $_SESSION['info'] = $Data;

      // print_r($check);
      header('location: portal.php');
    } else {

      echo '<script type="text/JavaScript">  
      alert("Invalid username or password"); 
      </script>';
    }
  }
}
?>