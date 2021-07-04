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
  <title>Reset Password</title>

 <!-- For checking password and confirm password   -->
 <script type="text/javascript">
      $(function() {
        $("#BtnSubmit").click(function() {
          var password = $("#Pass").val();
          var confirmPassword = $("#Con_Pass").val();
          if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
          }
          return true;
        });
      });
    </script>


</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     
    <ul class="nav navbar-nav navbar-left">
     
     <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Student Portal</a></li>
   
   </ul>
      <ul class="nav navbar-nav navbar-right">
     
        <li><a href="sign up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="log in.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
  <div class="Page">
    <h2> Password Reset </h2>
    <form action="" method="POST">
      <input type="text" placeholder="Phone or Email" name="phone_email" required>

      <input type="password" placeholder="New passwaord" id="Pass" name="password" minlength="6" maxlength="20" required>
      <input type="password" placeholder="Confrim password" id="Con_Pass" maxlength="20" required>
      <input type="submit" value="Submit" id="BtnSubmit" name="submit">
    </form>

    
</body>

</html>

<?php

if (isset($_POST['submit']))
 {

  $phone_or_email = $_POST['phone_email'];
  $password = $_POST['password'];

  if(!empty($phone_or_email)&&!empty($password))
  {

    $query = "SELECT * from  register WHERE Phone_No='".$phone_or_email."' OR Email='".$phone_or_email."'";
    
    
    $check = mysqli_query($connection, $query);
    $result = mysqli_num_rows($check);
    
    if ($result) {

      $query = "UPDATE register SET Password='$password' WHERE Phone_No='".$phone_or_email."' OR Email='".$phone_or_email."'";
      mysqli_query($connection, $query);
      header('location: reset_success.html');
    }
    else
    {
     
      echo '<script type="text/JavaScript">  
      alert("Invalid Email or Phone No"); 
      </script>';
      
    }
  }
    
  }
  ?>