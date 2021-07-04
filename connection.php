<?php
  $server_name="localhost";
  $username="User_portal";
  $password="12345";
  $database_name="portal";
  $connection=mysqli_connect($server_name,$username,$password,$database_name);
  if(!$connection)
      echo "not connected".mysqli_connect_error();
  else
  //Complaint box table creation
    $table="CREATE TABLE complain_box (Comp_No INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    s_id INT(4) NOT NULL,
    s_name VARCHAR(20) NOT NULL,
    email VARCHAR(30) NOT NULL,
    Complain VARCHAR(500) NOT NULL,
    Complain_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP)";

    $query=mysqli_query($connection,$table);

  //Courses Table Creation 
    $table="CREATE TABLE courses (c_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    c_name VARCHAR(20) NOT NULL,
    cradits INT(11) NOT NULL)";

    $query=mysqli_query($connection,$table);
    if($query)
    {
      $data="INSERT INTO courses VALUES(NULL,'ITC','3')";
      $query=mysqli_query($connection,$data);
      $data="INSERT INTO courses VALUES(NULL,'PF','4')";
      $query=mysqli_query($connection,$data);
      $data="INSERT INTO courses VALUES(NULL,'WAD','3')";
      $query=mysqli_query($connection,$data);
      $data="INSERT INTO courses VALUES(NULL,'ISD','3')";
      $query=mysqli_query($connection,$data);
      $data="INSERT INTO courses VALUES(NULL,'ISL','2')";
      $query=mysqli_query($connection,$data);
    }
?>