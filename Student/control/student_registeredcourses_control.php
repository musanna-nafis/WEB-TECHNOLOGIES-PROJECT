<?php 
include "../model/student_db_model.php";
$table="students";
$course="";
$msg="";
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];

$p=-1; $q=-1; $check=0;
$sql=$connectionstring->query("SELECT * FROM ac WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="AC";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>".$course."</td></tr></table>";
    $check=$check+1;
}
else{
    
    $p=$p+1;
    $courses[$p]="AC";
}
$sql=$connectionstring->query("SELECT * FROM accounting WHERE username='$username'");

if($sql->num_rows > 0)
{
    $check=$check+1;
    $course="Accounting";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>".$course."</td></tr></table>";
 
}
else{
    $p=$p+1;
    $courses[$p]="Accounting";
}
$sql=$connectionstring->query("SELECT * FROM algorithms WHERE username='$username'");

if($sql->num_rows > 0)
{  $check=$check+1;
 
    $course="Algorithms";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>Algorithms</td></tr></table>";
   
}
else{
    $p=$p+1;
    $courses[$p]="Algorithms";
}
$sql=$connectionstring->query("SELECT * FROM compiler_design WHERE username='$username'");

if($sql->num_rows > 0)
{  $check=$check+1;
 
    $course="Compiler_Design";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>Compiler Design</td></tr></table>";
  
}
else{
    $p=$p+1;
    $courses[$p]="Compiler_Design";
}
$sql=$connectionstring->query("SELECT * FROM data_structure WHERE username='$username'");

if($sql->num_rows > 0)
{  $check=$check+1;
 
    $course="Data_Structure";
    $row=$sql->fetch_assoc();
    echo "<table><tr><td>Data Structure</td></tr></table>";
   
}
else{
    $p=$p+1;
    $courses[$p]="Data_Structure";
}
$sql=$connectionstring->query("SELECT * FROM dc WHERE username='$username'");

if($sql->num_rows > 0)
{  $check=$check+1;
    $course="DC";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>DC</td></tr></table>";
  
}
else{
    $p=$p+1;
    $courses[$p]="DC";
}
$sql=$connectionstring->query("SELECT * FROM economics WHERE username='$username'");

if($sql->num_rows > 0)
{  $check=$check+1;
    $course="Economics";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>Economics</td></tr></table>";
  
}
else{
    $p=$p+1;
    $courses[$p]="Economics";
}

$sql=$connectionstring->query("SELECT * FROM web_technologies WHERE username='$username'");

if($sql->num_rows > 0)
{  $check=$check+1;
 
    $course="Web_Technologies";
    $row=$sql->fetch_assoc();
   
    echo "<table><tr><td>Web Technologies</td></tr></table>";
   
}
else{
    $p=$p+1;
    $courses[$p]="Web_Technologies";
}

if(  $check<1){
    echo"<br>";
    echo"No Course available";
}











$connectionstring->close();
?>
