<?php
session_start();
include "../control/teacher_viewprofile_control.php";
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

       /* if($_SESSION["designation"]=="Director")
        {
            header("Location:teacher_director_homepage_view.php");
        }
        */

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
            Teacher | profile
        </title>
        <link rel="stylesheet" type="text/css" href="../css/teacher/teacher.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/teacher/action.js"></script>
</head>
<h1 id="vname"> XYZ University Portal </h1>
 <div class="sticky">
<div class="topnav">
  <li><a href="#"> <a href="../view/teacher_homepage_view.php"><h2>Home</h2> </a>
  <b href="#"> <a href="../control/teacher_logout_control.php"><h2>LogOut</h2></a>

 </div> </div>
 <br>
  <h1 id="vname"> My Profile </h1>
<br><br><br><br>
<div>
<table>
<tr>
<td class="academics academicsitem">Teacher  Id : </td>
<td class="academics academicsitem"><?php echo $myid; ?></td>
</tr>
<tr>
<td class="academics academicsitem">Name : </td>
<td class="academics academicsitem"><?php echo $myfirstname." ".$mylastname; ?></td>
</tr>
<tr>
<td class="academics academicsitem">Gender : </td>
<td class="academics academicsitem"><?php echo $mygender; ?></td>
</tr>
<tr>
<td class="academics academicsitem">Access Status : </td>
<td class="academics academicsitem"><?php echo $myaccessstatus; ?></td>
</tr>
<tr>
<td class="academics academicsitem">Username : </td>
<td class="academics academicsitem"><?php echo $myusername; ?></td>
</tr>
<tr>
<td class="academics academicsitem">Email : </td>
<td class="academics academicsitem"><?php echo $myemail; ?></td>
</tr>
<tr>
<td class="academics academicsitem"> Contact : </td>
<td class="academics academicsitem"><?php echo $myphone; ?></td>
</tr>
<tr>
<td class="academics academicsitem">DOB : </td>
<td class="academics academicsitem"><?php echo  $mydob; ?></td>
</tr>
<tr>
<td class="academics academicsitem">Designation : </td>
<td class="academics academicsitem"><?php echo  $mydesignation; ?></td>
</tr>
</table>
</div>
</body>
<button id="in" class="zoom">Zoom In</button>
<button id="out" class="zoom">Zoom Out</button>
</html>