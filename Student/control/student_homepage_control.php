<html>
<head>
    <title>Student/Home</title>
    <link rel="stylesheet" type="text/css" href="../css/student/student.css">
</head></html>


<?php 
include "../model/student_db_model.php";
$table="students";
$course="";
$msg="";
$c=0;
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];

$p=-1;  $q=-1;    $arrlength1=0; 
$sql=$connectionstring->query("SELECT * FROM ac WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="AC";
    $row=$sql->fetch_assoc();
   
    
    $q=$q+1;
    $hcourses[$q]="AC";
  $c=$c+1;
}

$sql=$connectionstring->query("SELECT * FROM accounting WHERE username='$username'");

if($sql->num_rows > 0)
{
    $c=$c+1;
    $course="Accounting";
    $row=$sql->fetch_assoc();
    $q=$q+1;  
    $hcourses[$q] ="Accounting";
}

$sql=$connectionstring->query("SELECT * FROM algorithms WHERE username='$username'");

if($sql->num_rows > 0)
{
    $c=$c+1;
    $course="Algorithms";
    $row=$sql->fetch_assoc();
    $q=$q+1;
   
    $hcourses[$q] ="Algorithms";
}

$sql=$connectionstring->query("SELECT * FROM compiler_design WHERE username='$username'");

if($sql->num_rows > 0)
{
    $c=$c+1; 
    $course="Compiler_Design";
    $row=$sql->fetch_assoc();
    $q=$q+1;
  
    $hcourses[$q]="Compiler_Design";
}

$sql=$connectionstring->query("SELECT * FROM data_structure WHERE username='$username'");

if($sql->num_rows > 0)
{
    $c=$c+1;
    $course="Data_Structure";
    $row=$sql->fetch_assoc();
    $q=$q+1; 
    $hcourses[$q]="Data_Structure";
}

$sql=$connectionstring->query("SELECT * FROM dc WHERE username='$username'");

if($sql->num_rows > 0)
{  $c=$c+1;
    $course="DC";
    $row=$sql->fetch_assoc();
    
    $q=$q+1;
    $hcourses[$q] ="DC";  
}

$sql=$connectionstring->query("SELECT * FROM economics WHERE username='$username'");

if($sql->num_rows > 0)
{   $c=$c+1;
    $course="Economics";
    $row=$sql->fetch_assoc();
    $q=$q+1;
   
    $hcourses[$q]="Economics";
}

$sql=$connectionstring->query("SELECT * FROM web_technologies WHERE username='$username'");

if($sql->num_rows > 0)
{
    $c=$c+1;
    $course="Web_Technologies";
    $row=$sql->fetch_assoc();
    $q=$q+1;
  
    $hcourses[$q]="Web_Technologies"; 
}









?>