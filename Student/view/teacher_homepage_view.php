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
        <head>
 <h1 id="vname"> XYZ University Portal </h1>
 <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3>
 <div class="sticky">
<div class="topnav">
  <li><a href="#"> <a href="../view/teacher_homepage_view.php"><h3>Home</h3> </a>
  <b href="#"> <a href="../control/teacher_logout_control.php"><h3>LogOut</h3></a>
 </div> </div>
<br>

<p3><h2 id="academic">Academics</h2></p3>


<div>
<ol class="c">
<li class="academics academicsitem"><a href="../view/teacher_assignresult_view.php"><h4 id="myfavourite">Assign Result</h4></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_droprequest_view.php"><h4 id="myfavourite">Accept/Reject Drop Request</h4></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_leaverequest_view.php"><h4 id="myfavourite">Apply for leave application</h4></a></li>
  <li class="academics academicsitem"><a href="../view/teacher_postassignment_view.php"><h4 id="myfavourite">Post Assignment to student</h4></a></li>
</ol>
</div>




 <form action="" method="POST">
 <table><tr><td>Select a step</td> </tr>
 <tr>
 <td>
    <select id="step" name="step">
    <option value="1.Give Result ">1. Assign Result </option>
    <option value="2.Accept/Reject Drop Request">2. Accept/Reject Drop Request</option>
    <option value="3.Apply for leave application">3. Apply for leave application</option>
    <option value="4.Post Assignment to student">4. Post Assignment to student</option>
    </select>
 </td>
</tr>

<tr>
    <td>
    <input type="submit" value="Choose">
    </td>
</tr>
</form>
</body>
</html>