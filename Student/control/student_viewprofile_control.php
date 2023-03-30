


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
 <div class="academics"><?php echo"<h3>".$_SESSION["username"]." 's Profile</h3>";?></div>
</div>
 


    


  
 <?php
include "../model/student_db_model.php";
$table="students";

$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$_SESSION["username"]."' AND password='".$_SESSION["password"]."'");
if($sql->num_rows > 0)
{
    $row=$sql->fetch_assoc();
   
        echo "<table><tr><td>Student Id </td><td>".$row["id"]."</td></tr>";
        echo "<tr><td>Name </td><td>".$row["first_name"]." ".$row["last_name"]."</td></tr>";
        echo "<tr><td>Gender </td> <td>".$row["gender"]."</td></tr>";
        echo "<tr><td>Access Status </td> <td>".$row["access_status"]."</td></tr>";
        echo "<tr><td>Username </td><td>".$row["username"]."</td></tr>";
        echo "<tr><td>Verified Email </td> <td>".$row["email"]."</td></tr>";
        echo "<tr><td>Verified Contact </td> <td>".$row["phone"]."</td></tr>";
        echo "<tr><td>Date Of Birth </td><td>".$row["dob"]."</td></tr>";
        echo "<tr><td>Due Fees </td><td>".$row["due_fees"]."</td></tr>";
     echo "<tr><td>Department </td><td>".$row["department"]."</td></tr>";
        echo "<tr><td>Program </td><td>".$row["program"]."</td></tr></table>";
       
    
}$connectionstring->close();


?>
<html><head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/student/jqu.js"></script>

<br>
<button id="hide" class="show">Hide</button>
<button id="show" class="hide ">Show</button>
</head></html>



    
    


