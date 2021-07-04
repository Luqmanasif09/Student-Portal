<?php

    session_start();
    session_unset();
    session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style3.css">
    <title>Main Page</title>
</head>
<body>


  <div class=Page1>
      <h2>WELCOME TO STUDENT PORTAL</h1><br>
  </div>
  <div class=Page2>
      <a href="sign up.php"><h2>SignUp to register</h2></a>
  </div>
  <div class=Page2>
      <a href="log in.php"><h2>login To check your progress</h2></a>
  </div>

</body>
</html>
  