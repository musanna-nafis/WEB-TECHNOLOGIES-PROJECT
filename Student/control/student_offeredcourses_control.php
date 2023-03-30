<?php
session_start(); 

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



include "../model/student_db_model.php";

$table="students";
$course="";
$msg="";
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];
$department=$_SESSION["department"];


$capacity="40";
$status="Open";?>
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
 <div class="academics"><h3>Offered Courses</h3></div>
</div>
</html>


<?php

$var="Offered Courses:";
$ct=0;

 $p=-1;
$sql=$connectionstring->query("SELECT * FROM ac WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="AC";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="AC";
}
$sql=$connectionstring->query("SELECT * FROM accounting WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Accounting";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="Accounting";
}
$sql=$connectionstring->query("SELECT * FROM algorithms WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Algorithms";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="Algorithms";
}
$sql=$connectionstring->query("SELECT * FROM compiler_design WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Compiler_Design";
    $row=$sql->fetch_assoc();
   
   
}
else{
    $p=$p+1;
    $courses[$p]="Compiler_Design";
}
$sql=$connectionstring->query("SELECT * FROM data_structure WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Data_Structure";
    $row=$sql->fetch_assoc();
    
    
}
else{
    $p=$p+1;
    $courses[$p]="Data_Structure";
}
$sql=$connectionstring->query("SELECT * FROM dc WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="DC";
    $row=$sql->fetch_assoc();
   
    
    
}
else{
    $p=$p+1;
    $courses[$p]="DC";
}
$sql=$connectionstring->query("SELECT * FROM economics WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="Economics";
    $row=$sql->fetch_assoc();
   
    
}
else{
    $p=$p+1;
    $courses[$p]="Economics";
}

$sql=$connectionstring->query("SELECT * FROM web_technologies WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Web_Technologies";
    $row=$sql->fetch_assoc();
   
    
}
else{
    $p=$p+1;
    $courses[$p]="Web_Technologies";
}
$arrlength = count($courses);
if($arrlength ==0){
    echo "No course is available";
  }
  else{
echo "<table><tr><th>Course</th><th>Status</th><th>Capacity</th><th>Student Count</th><th>Department</th></tr>";
for($x = 0; $x < $arrlength; $x++) {
  $course=$courses[$x];
 
  $sql=$connectionstring->query("SELECT * FROM subjects WHERE course_name= '$course' AND department='$department'");
  if($sql->num_rows > 0)
  {
   
     $ct=$ct+1; 
      $row=$sql->fetch_assoc();
     
      echo "<tr><td>".$course."</td><td>".$status."</td><td>".$capacity."</td><td>".$row["student_count"]."</td><td>".$department."</td></tr>";
      echo "<br>";
}}}


  
  


  

















$connectionstring->close();
?>
