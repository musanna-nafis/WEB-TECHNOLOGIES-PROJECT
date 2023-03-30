<?php
session_start();
include "../control/teacher_director_assign_control.php";
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
            Director | Assign
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
<h3 id="academic">Select a subject</h3>
 <form action="" method="POST">
 <table>
 <tr>
 <td>
    <select id="step" name="step">
    <option value="1.Algorithms">1.Algorithms</option>
    <option value="2.Data Structure">2.Data Structure</option>
    <option value="3.Compiler Design">3.Compiler Design</option>
    <option value="4.Web Technologies">4.Web Technologies</option>
    <option value="5.DC">5.DC</option>
    <option value="6.AC">6.AC</option>
    <option value="7.Accounting">7.Accounting</option>
    <option value="8.Economics">8.Economics</option>
    </select>
 </td>
</tr>
<tr><td>
<h3 id="academic">Teacher username:</h3>
</td></tr>
<tr>
        <td><input type="text" name="username"></td>
        <td id="error"><?php echo  $vusername; ?><br><br></td>
        <td id="error"><?php echo  $vmsg; ?><br><br></td>
     
    
</tr>

<tr>
    <td>
    <input type="submit" class="button1" value="Assign">
    </td>
    <td id="success"><?php echo  $omoa; ?><br><br></td>
</tr>
</form>

<p3><h2 id="academic" class="myposition" style = 'position:fixed; right:436px; top:220px;'>Subjects List</h2></p3>
    <?php $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $username=$_SESSION["username"];

        echo "<table id='id1' class='center' style = 'position:fixed; right:100px; top:300px;'>"; echo "<tr id='id1'><th id='id2'>ID</th><th id='id2'>Course Name</th><th id='id2'>Course Teacher</th><th id='id2'>Department</th><th id='id2'>Student_Count</th></tr>";
        
        $sql=$connectionstring->query("SELECT * FROM subjects");

        while($row=$sql->fetch_assoc())
        {
            echo "<tr id='id1'><td id='id2'>".$row["id"]."</td><td id='id2'>".$row["course_name"]."</td><td id='id2'>".$row["course_teacher"]."</td><td id='id2'>".$row["department"]."</td><td id='id2'>".$row["student_count"]."</td></tr>";
        
            echo "<br>";
        }
        echo  "</table>";  
        $connectionstring->close(); ?>
</body>
</html>
