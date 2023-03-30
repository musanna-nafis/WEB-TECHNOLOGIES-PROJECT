<?php
session_start(); 

if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
{
    header("Location:login_view.php");
}

if(isset($_SESSION["username"])  && isset($_SESSION["password"])){
   
   
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
 
 <div class="lBorder" >
 <div class="academics"><h3>Registered Courses</h3></div>
</div>
</html>
<?php 
echo "<br><table><tr><th>Registered Courses</th></tr></table>";
include "../control/student_registeredcourses_control.php";













?>
