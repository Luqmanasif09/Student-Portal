<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap links for direct use -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="./css/style.css"> 
  <title>Sign Up</title>

 <!-- For checking password and confirm password   -->
 <script type="text/javascript">
      $(
	  
			function()
			{
				$("#btnSubmit").click
				(
				
					function()
					{
						var password = $("#Pass").val();
						var confirmPassword = $("#Con_Pass").val();
						if (password != confirmPassword)
						{
							alert("Passwords do not match.");
							return false;
						}
							return true;
					}
				);
			}
	  );
    </script>


</head>

<body>

  <!-- Navigation bar -->
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

  <!-- Sign Up  form -->
  <div class="Page">
    <h2> Sign Up </h2>
    <form action="" method="POST" autocomplete="off">
      <input type="text" placeholder="Name" name="u_name" maxlength="20" required>
      <input type="text" placeholder="Father Name" name="F_name" maxlength="20" required>
      <input type="email" placeholder="Email" name="email" maxlength="30" required>

      <input type="tel" placeholder="03xxxxxxxxx" name="phone" minlength="11" maxlength="11" required>

      <label for="DOB">Date of birth :</label>
      <input type="date" id="DOB" name="DOB">

      <input type="text" placeholder="Enter Previous Institute" name="ins" required>

      <label for="Gender">Select Gender </label><br>
      <input type="radio" name="gender" value="male"> Male
      <input type="radio" name="gender" value="female"> Female
      <input type="radio" name="gender" value="other"> Other

      <input type="text" placeholder="Address" name="Add" maxlength="50" required>
      <input type="text" placeholder="City" name="city" maxlength="10" required><br>
      <input type="text" placeholder="Country" name="country" maxlength="15" required><br>

      <input type="password" placeholder="New passwaord" id="Pass" name="password"minlength="6" maxlength="20">
      <input type="password" placeholder="Confrim password" id="Con_Pass" maxlength="20">
      <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit">
    </form>

  </div>

</body>

</html>

<?php
                                        /*Insert Into DataBase: Portal, table: register */


if (isset($_POST['btnSubmit'])) {
  $u_name = $_POST['u_name'];
  $F_name = $_POST['F_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $ins = $_POST['ins'];
  $Coun = $_POST['country'];
  $Dob = $_POST['DOB'];
  $Gender = $_POST['gender'];
  $password = $_POST['password'];
  $Address = $_POST['Add'];


  // check phone and email is present already in database or not

  $query1 = "select * from register";
  $data1 = mysqli_query($connection, $query1);
  $row = mysqli_num_rows($data1); // get number of rows of the table in the database
  $check = false;

  for ($i = 0; $i < $row; $i++) {
    $info = mysqli_fetch_assoc($data1); // get data of single row
    if ($info['Phone_No'] == $phone || $info['Email'] == $email) {
      echo '<script type="text/JavaScript">  
      alert("Email or Phone already exist....."); 
       </script>';
      $check = true;
      break;
    }
  }

  if (!$check)
   {
    $query = "INSERT INTO REGISTER VALUES 
    ('$u_name','$email','$phone','$F_name','$password','$ins'
    ,'$Gender','$Coun','$Dob','$Address','Null')";

    $data = mysqli_query($connection, $query);

    if ($data) {
      echo '<script type="text/JavaScript">  
      alert("Data inserted"); 
       </script>';
        header('location: registered.html');
    } else {
      echo '<script type="text/JavaScript">  
      alert("Registration Failed....."); 
       </script>';
    }
  }
  
}

?>