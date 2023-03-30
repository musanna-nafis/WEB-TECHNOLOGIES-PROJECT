<?php
session_start();
include "../control/teacher_postassignment_control.php";
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
            Teacher | Assign Assignment
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

 <form action="" method="POST">
 <table>
 <tr>
 <td>
 <textarea name="assignment" rows="20" cols="60"></textarea>
 </td>
 <td id="success"> <?php echo $notice; ?> </td>
</tr>

<tr>
    <td>
    <input type="submit" class="button1" value="post">
    </td>
</tr>
</form>
</body>
</html>