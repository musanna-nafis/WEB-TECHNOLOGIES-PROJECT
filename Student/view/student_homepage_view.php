<?php 

session_start(); 
include "../control/student_homepage_control.php";


if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
{
    header("Location:login_view.php");
}

if(isset($_SESSION["username"])  && isset($_SESSION["password"]))
{
    if($_SESSION["user_type"]=='admin')
    {
        header("Location:admin_homepage_view.php");
    }
    else if($_SESSION["user_type"]=='teacher')
    {
      
        if($_SESSION["designation"]=="Director")
        {
            header("Location:teacher_director_homepage_view.php");
        }
        else 
        {
            header("Location:teacher_homepage_view.php");
        }

    }
    else if($_SESSION["user_type"]=="student")
    {
		   
    }
    else
    {

    }
}


?>
<html>
<head>
    <title>Student/Home</title>
    <link rel="stylesheet" type="text/css" href="../css/student/student.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/student/jqu.js"></script>
</head>

<body>
<h1 class="xyz">XYZ University Portal</h1>  
<div class="sticky">
<div class="topnav">
  <a href="#"> <td> <a href="../view/student_homepage_view.php">Home</a></td></a>
  <a href="#"><a href="../control/student_viewprofile_control.php">View Profile</a>
  <a href="#"><a href="../view/student_settings_view.php">Settings</a>
  <b><a href="../control/student_logout_control.php"target="_blank">Logout</a><b>
 </div> </div>
<div class="header">
<h1><?php echo "<h2>Welcome ".$_SESSION["username"]."</h2>";?>

  </div>
  <div id="flip">Notifications</div>
<div id="panel">New notes uploaded by ABC [3000-3066-2]</div>
<button id="in" class="zoom">Zoom In (+)</button>
<button id="out" class="zoom">Zoom Out (-)</button>

 <form action="" method="GET">

 <div id="element1">
<div class="cen" >
<p class="solid"><a href="../view/student_selectcourse_view.php">Select Courses</a></p>
  <p class="solid"><a href="../view/student_dropapplication_view.php">Drop Application</a></p>
 <p class="solid"><a href="../view/student_coursesandresult_view.php">Courses and Result</a></p>
  <p class="solid"><a href="../view/student_registeredcourses_view.php">Registered Courses</a></p>
  <p class="solid"><a href="../control/student_financial_control.php">Financials</a></p>
 <p class="solid"><a href="../control/student_offeredcourses_control.php">Offered Courses</a></p>
  <p class="solid"><a href="../view/student_submitassignment_view.php">Submit Assignment</a></p>
  <p class="solid"><a href="../view/student_dropsemester_view.php">Drop Semester</a></p>
 
  </div>
  </div>

 
  <div id="element2">
  <?php echo "<center class=tsz>My Courses</center>";

  $hcourse="";
  if($c>0){
    echo "<table class=center><tr><th>ID</th><th>Course Name</th><th>Course Teacher</th><th>Department</th><th>Student Count</th></tr>";
     $arrlength1 = count($hcourses);
    for($x = 0; $x < $arrlength1; $x++) {
      $hcourse=$hcourses[$x];
     
      $sql=$connectionstring->query("SELECT * FROM subjects WHERE course_name= '$hcourse'");
      if($sql->num_rows > 0)
      {
       
      
          $row=$sql->fetch_assoc();
         
          echo "<tr><td>".$row["id"]."</td><td>".$row["course_name"]."</td><td>".$row["course_teacher"]."</td><td>".$row["department"]."</td><td>".$row["student_count"]."</td></tr>";
    
          echo "<br>";
    }
}
    
  }
  else{echo"<br>"; echo"No course available";}  echo "</table>";  
  echo"</div>"; 
  $connectionstring->close();
  ?>
 

</form>

</body>


</html>

<!-- <div class="cen"><?php include "admin_footer_view.php"; ?></div>  -->
<!-- 
<?php include "admin_footer_view.php"; ?> -->


      
  
