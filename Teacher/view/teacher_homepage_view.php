<?php
session_start();
include "../control/teacher_homepage_control.php";
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
            Teacher | Home
        </title>
        <link rel="stylesheet" type="text/css" href="../css/teacher/teacher.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/teacher/action.js"></script>
</head>
 <h1 id="vname"> XYZ University Portal </h1>
 <h2>Welcome  <a id="myfavourite" href="../view/teacher_viewprofile_view.php"><?php  echo  $_SESSION["username"]; ?> </a> </h2>
 <div class="sticky">
<div class="topnav">
  <li><a href="#"> <a href="../view/teacher_homepage_view.php"><h2>Home</h2> </a>
  <b href="#"> <a href="../control/teacher_logout_control.php"><h2>LogOut</h2></a>
 </div> </div>
<br>

<p3><h2 id="academic">Academics</h2></p3><br>

<div>
<ol class="c">
  <li class="academics academicsitem"><a href="../view/teacher_assignresult_view.php"><h3>Assign Result</h3></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_droprequest_view.php"><h3>Accept/Reject Drop Request</h3></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_leaverequest_view.php"><h3>Apply for leave application</h3></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_postassignment_view.php"><h3>Post Assignment to student</h3></a></li>
</ol>
</div>
<p3><h2 id="academic" class="myposition" style = 'position:fixed; right:436px; top:220px;'>Courses</h2></p3>
    <?php $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $username=$_SESSION["username"];

        echo "<table id='id1' class='center' style = 'position:fixed; right:100px; top:350px;'>"; echo "<tr id='id1'><th id='id2'>ID</th><th id='id2'>Course Name</th><th id='id2'>Course Teacher</th><th id='id2'>Department</th><th id='id2'>Student_Count</th></tr>";
        
        $sql=$connectionstring->query("SELECT * FROM subjects WHERE course_teacher='$username'");

        while($row=$sql->fetch_assoc())
        {
            echo "<tr id='id1'><td id='id2'>".$row["id"]."</td><td id='id2'>".$row["course_name"]."</td><td id='id2'>".$row["course_teacher"]."</td><td id='id2'>".$row["department"]."</td><td id='id2'>".$row["student_count"]."</td></tr>";
        
            echo "<br>";
        }
        echo  "</table>";  
        $connectionstring->close(); ?>

<br>
<button id="hide" class="show" style = 'position:fixed; right:700px; top:320px;'>Hide</button>
<button id="show" class="hide" style = 'position:fixed; right:136px; top:320px;'>Show</button>
</head></html>
</html>