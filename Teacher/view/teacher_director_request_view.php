<?php
session_start();
include "../control/teacher_director_request_control.php";
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
      
       
        if($_SESSION["designation"]=="Other") 
        {
            header("Location:teacher_homepage_view.php");
        }

    }
    else if($_SESSION["user_type"]=="student")
    {
		header("Location:student_homepage_view.php");
    }
    else
    {

    }
}


?>
<html>
 <body>
     <head>
 <title>
            Director | Request
        </title>
        <link rel="stylesheet" type="text/css" href="../css/teacher/teacher.css">
</head>
<h1 id="vname"> XYZ University Portal </h1>
 <h2>Welcome  <a id="myfavourite" href="../view/teacher_viewprofile_view.php"><?php  echo  $_SESSION["username"]; ?> </a> </h2>
 <div class="sticky">
<div class="topnav">
  <li><a href="#"> <a href="../view/teacher_homepage_view.php"><h2>Home</h2> </a>
  <b href="#"> <a href="../control/teacher_logout_control.php"><h2>LogOut</h2></a>
 </div> </div>
<br>
<h3 id="academic">Username</h3>
 <form action="" method="POST">
 <table><tr>
     <td><input type="text" name="username"></td>
     <td id="error">  <?php echo $vusername; ?> </td>
    </tr>
 <tr>
 <td>
    <select id="step" name="step">
    <option value="1.Accept">1. Accept</option>
    <option value="2.Reject">2. Reject</option>
    </select>
 </td>
 <td>  <?php echo $msg; ?> </td>
</tr>

<tr>
    <td>
    <input type="submit" class="button1" value="Done">
    </td>
</tr>
</form>
<p3><h2 id="academic" class="myposition" style = 'position:fixed; right:436px; top:220px;'>All Leave Requests</h2></p3>
    <?php $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $username=$_SESSION["username"];

        echo "<table id='id1' class='center' style = 'position:fixed; right:100px; top:300px;'>"; echo "<tr id='id1'><th id='id2'>Leave Id</th><th id='id2'>Teacher Name</th><th id='id2'>Status</th></tr>";
        
        $sql=$connectionstring->query("SELECT * FROM leave_applications");

        while($row=$sql->fetch_assoc())
        {
            echo "<tr id='id1'><td id='id2'>".$row["id"]."</td><td id='id2'>".$row["username"]."</td><td id='id2'>".$row["status"]."</td></tr>";
        
            echo "<br>";
        }
        echo  "</table>";  
        $connectionstring->close(); ?>
</body>
</html>