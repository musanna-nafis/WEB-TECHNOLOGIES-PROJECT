<?php
session_start();
include "../control/teacher_director_homepage_control.php";

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
            Director | Home
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
  <li class="academics academicsitem"><a href="../view/teacher_director_request_view.php"><h3>Accept/Reject leave request</h3></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_director_assign_view.php"><h3>Assign subject to teacher</h3></a></li>
</ol>
</div>
<div id="flip" style = 'position:fixed; right:700px; top:130px;'>Messages</div>
<div id="panel" style = 'position:fixed; right:700px; top:190px;'>New Message By Faculty Member</div>
</body>
</html>