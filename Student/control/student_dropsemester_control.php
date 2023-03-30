<?php 

$table="students";
$course="";
$msg="";
$count1=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
$username=$_SESSION["username"];


  if(isset($_REQUEST["drps"])){
    
    $sql=$connectionstring->query("SELECT * FROM ac WHERE username='$username'");
if($sql->num_rows > 0)
{
    $sql=$connectionstring->query("DELETE  FROM ac WHERE username='$username'");
    $count1=$count1+1;
 
}

$sql=$connectionstring->query("SELECT * FROM accounting WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $sql=$connectionstring->query("DELETE FROM accounting WHERE username='$username'");
 
    $count1=$count1+1;
    
 
}

$sql=$connectionstring->query("SELECT * FROM algorithms WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $sql=$connectionstring->query("DELETE FROM algorithms WHERE username='$username'");
    $count1=$count1+1;
  
   
}

$sql=$connectionstring->query("SELECT * FROM compiler_design WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $sql=$connectionstring->query("DELETE FROM compiler_design WHERE username='$username'");
   
    $count1=$count1+1;
  
}

$sql=$connectionstring->query("SELECT * FROM data_structure WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $sql=$connectionstring->query("DELETE FROM data_structure WHERE username='$username'");
    $count1=$count1+1;
   
}

$sql=$connectionstring->query("SELECT * FROM dc WHERE username='$username'");

if($sql->num_rows > 0)
{
    
    $sql=$connectionstring->query("DELETE FROM dc WHERE username='$username'");
  
    $count1=$count1+1; 
  
}

$sql=$connectionstring->query("SELECT * FROM economics WHERE username='$username'");

if($sql->num_rows > 0)
{
    
    $sql=$connectionstring->query("DELETE  FROM economics WHERE username='$username'");
   
    $count1=$count1+1;
  
}

$sql=$connectionstring->query("SELECT * FROM web_technologies WHERE username='$username'");

if($sql->num_rows > 0)
{
 
   
    $sql=$connectionstring->query("DELETE  FROM web_technologies WHERE username='$username'");
  
    $count1=$count1+1;
   
}
if($count1==0){echo"Semester Dropped";}

  }

  $connectionstring->close();
}








?>
