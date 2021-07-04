<?php


session_start();

function is_studing($c_id)
{
  include("connection.php");
  $query = "SELECT * from std_courses WHERE s_id='" . $_SESSION['info']['id'] . "'AND c_id='" . $c_id . "'";
  $Check = mysqli_query($connection, $query);
  $Data = mysqli_fetch_assoc($Check);
  if (isset($Data))
    return true;
  else
    return false;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Effort', 'Amount given'],
        ['Attandance', 100],
      ]);

      var options = {
        pieHole: 0.8,
        pieSliceTextStyle: {
          color: 'black',
        },
        legend: 'none'
      };

      var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
      chart.draw(data, options);
    }
    $(

      function()
      {
        $("#donut_single").change(
          function()
          {
            $("#dount_single").text("90"); 
          }
        )
      }
    );
  </script>

  <style>
    .bord {
      background-color: white;
      /* width: 380px; */
      border: 2px solid black;
      padding-bottom: 90px;

    }

    .nboard {
      margin-top: 70px;
    }

    /* .add_courses{

      font-size: 30px;
      padding-bottom: 200px;
    }
    .info{
      font-size: 30px;
    }  */
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      
      margin-bottom: 0;
      border-radius: 0;

    }
   
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 450px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
      width: 33%;
      margin-top: 60px;
      padding-bottom: 10px;
      margin-bottom: 50px;
    }

   

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;

      }

      .row.content {
        height: auto;
      }


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
        <a class="navbar-brand" href="#"> 
          <h4 style="color:white; ;padding-right: 25px; margin:1px">

            <?php echo $_SESSION['info']['User_Name'];?>
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

 
  <div class="col-sm-8 text-left" ,class="my_col-sm-8">
    <h3 align="center"><b>Time Table</b></h3>
    <table border="5" cellspacing="0" align="center">
    
      <tr>
        <td align="center" height="50" width="100"><br>
          <b>Day/Lecture</b></br>
        </td>
        <td align="center" height="50" width="100">
          <b><br>8:00-9:20</b>
        </td>
        <td align="center" height="50" width="100">
          <b><br>9:30-10:50</b>
        </td>
        <td align="center" height="50" width="100">
          <b><br>11:00-12:20</b>
        </td>
        <td align="center" height="50" width="100">
          <b>12:30-01:50</b>
        </td>
        <td align="center" height="50" width="100">
          <b><br>02:00-03:20</b>
        </td>
        <td align="center" height="50" width="100">
          <b><br>03:30-4:50</b>
        </td>
        <td align="center" height="50" width="100">
          <b><br>05:00-6:20</b>
        </td>
        <td align="center" height="50" width="100">
          <b><br>06:30-7:50</b>
        </td>
      </tr>
      <tr>
        <td align="center" height="50">
          <b>MONDAY</b>
        </td>
        <td style="text-align:center;height:50; ">OS</td>
        <td align="center" height="50">AA</td>
        <td align="center" height="50">DE</td>
        <td style="background:red;" rowspan="6" align="center" height="50">
          <h2 ">B<br>R<br>E<br>A<br>K</h2>
            </td>
            <td colspan=" 2" align="center" height="50">OS LAB
        </td>
        <td colspan="2" align="center" height="50">Phy</td>
      </tr>
      <tr>
        <td align="center" height="50">
          <b>TUESDAY</b>
        </td>
        <td colspan="3" align="center" height="50">OS LAB
        </td>
        <?php
        $check = is_studing(3);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:lightgreen;">' . "WAD" . '</td>';
        else
          echo  '<td align="center" height="50" >' . "WAD" . '</td>';
        ?>
        <td align="center" height="50">IS</td>
        <td align="center" height="50">LA</td>
        <td align="center" height="50">OOP</td>
      </tr>
      <tr>
        <td align="center" height="50">
          <b>WEDNESDAY</b>
        </td>
        <td align="center" height="50">OS</td>
        <td align="center" height="50">ENG</td>
        <td align="center" height="50">AA</td>
        <td colspan="2" align="center" height="50">DE</td>
        <?php
        $check = is_studing(2);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:yellow;"  colspan="2">' . "PF" . '</td>';
        else
          echo  '<td align="center" height="50"  colspan="2" >' . "PF" . '</td>';
        ?>
      </tr>
      <tr>
        <td align="center" height="50">
          <b>THURSDAY</b>
        </td>
        <?php
        $check = is_studing(3);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:lightgreen;">' . "WAD" . '</td>';
        else
          echo  '<td align="center" height="50" >' . "WAD" . '</td>';
        ?>
        <?php
        $check = is_studing(4);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:lightblue;">' . "ISD" . '</td>';
        else
          echo  '<td align="center" height="50" >' . "ISD" . '</td>';
        ?>
        <td align="center" height="50">LA</td>
        <td colspan="3" align="center" height="50">OOP
        </td>
        <td align="center" height="50">ENG</td>
      </tr>
      <tr>
        <td align="center" height="50">
          <b>FRIDAY</b>
        </td>
        <td colspan="3" align="center" height="50">LAB OS
        </td>
        <?php
        $check = is_studing(4);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:lightblue;">' . "ISD" . '</td>';
        else
          echo  '<td align="center" height="50" >' . "ISD" . '</td>';
        ?>

        <td align="center" height="50">OOP</td>
        <?php
        $check = is_studing(5);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:lightpink;">' . "ISL" . '</td>';
        else
          echo  '<td align="center" height="50" >' . "ISL" . '</td>';
        ?>
        <td align="center" height="50">LT</td>
      </tr>
      <tr>
        <td align="center" height="50">
          <b>SATURDAY</b>
        </td>
        <?php
        $check = is_studing(1);
        if ($check)
          echo  '<td style="text-align:center; height:50; background:lightcoral;">' . "ITC" . '</td>';
        else
          echo  '<td align="center" height="50" >' . "ITC" . '</td>';
        ?>
        <td align="center" height="50">LT</td>
        <td align="center" height="50">LA</td>
        <td colspan="3" align="center" height="50">MEETUP
        </td>
        <td align="center" height="50">SPORTS</td>
      </tr>
    </table>
  </div>
  <div class="col-sm-2 sidenav">
    <h4><b>Attendance Report</b></h4>
    <div id="donut_single" style="width: auto; height: auto;"></div>
    <div class="nboard">
      <h4><b>NoticeBoard</b></h4>
      <div class="bord">
        <ul>

          <li> Welcome to Portal</li>
          <li> Lorem ipsum dolor sit amet, consectetur adipisicing eli</li>
          <li> Lorem ipsum dolor sit amet, consectetur adipisicing eli</li>
        </ul>

      </div>
    </div>
  </div>
  </div>
  </div>
   

 


</body>

</html>