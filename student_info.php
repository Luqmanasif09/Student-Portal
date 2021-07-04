<?php
    include('connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Info</title>
    <style>
      body{
        background-color: #23689b;
      }
  .under_line{
    border-bottom: 1px solid black;
    text-align: center;
    
  }
  tr{
    
    height: 50px;
    
  }
table{
  
  background-color: #d9dab0;
  text-align: center;
    
    margin-left:35%;
    width: 30%;
    border-radius:20px;
   
  }
  h2{
    text-align: center;
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
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Student Info</a></li>
          <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
  </div>
</nav>

    <h2>Student Information</h2>
    <table >
    
        
        <?php
                $arr=$_SESSION['info'];
                $query="select *from register where id='".$arr['id']."'";
                $data=mysqli_query($connection,$query);
                $information=mysqli_fetch_all($data,MYSQLI_ASSOC);
  
                foreach($information as $singleRecord){
              
                 echo '<tr>'.'<th class="under_line">'."Student ID: ".'</th>'.'<td  class="under_line"">'.$singleRecord['id'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Student Name: ".'</th>'.'<td class="under_line" ">'.$singleRecord['User_Name'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Father Name: ".'</th>'.'<td class="under_line" ">'.$singleRecord['Father_Name'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Phone No: ".'</th>'.'<td class="under_line" ">'.$singleRecord['Phone_No'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Email: ".'</th>'.'<td  class="under_line"">'.$singleRecord['Email'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Previous Institution: ".'</th>'.'<td  class="under_line"">'.$singleRecord['Institution'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Gender: ".'</th>'.'<td  class="under_line"">'.$singleRecord['Gender'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Country: ".'</th>'.'<td  class="under_line"">'.$singleRecord['Country'].'</td>'.'</tr>'.
                      '<tr>'.'<th class="under_line">'."Date of Birth: ".'</th>'.'<td  class="under_line"">'.$singleRecord['DOB'].'</td>'.'</tr>'.
                      '<tr>'.'<th style="text-align: center";>'."Address: ".'</th>'.'<td  ">'.$singleRecord['Address'].'</td>'.'</tr>';
                  }  
            ?>    
        </table>
</body>
</html>