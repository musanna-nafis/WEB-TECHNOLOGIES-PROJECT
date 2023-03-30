<?php
session_start();
include "../control/teacher_studentresult_control.php";
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
            Teacher | Student Result
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
        <td id="academic"><h3> Student Username:</h3></td>
        <td><input type="text" name="username1"></td>
        <td id="error"><?php echo  $vusername1; ?><br><br></td>
    </tr>
    <tr>
        <td id="academic"><h3>Written:</h3></td>
        <td><input type="text" name="written"></td>
        <td id="error"><?php echo  $vwritten; ?><br><br></td>
    </tr>
    <tr>
        <td id="academic"><h3>Quiz:</h3></td>
        <td><input type="text" name="quiz"></td>
        <td id="error"><?php echo  $vquiz; ?><br><br></td>
    </tr>
    <tr>
        <td id="academic"><h3>Attendence and performance:</h3></td>
        <td><input type="text" name="ap"></td>
        <td id="error"><?php echo  $vap; ?><br><br></td>
    </tr>
<tr>
<td>
<input type="submit" class="button1" value="Assign Result">
</td>
<td id="success"><?php echo  $mymsg; ?><br><br></td>
</tr>
</table>
</form>
<p3><h2 id="academic" class="myposition" style = 'position:fixed; right:436px; top:220px;'>Students List</h2></p3>
    <?php
    
    
    $subject= $_SESSION["resultcourse"];

    $table1;

if($subject=="Web_Technologies")
    {
       $table1="web_technologies";
    }
    else if($subject=="Economics")
    {
       $table1="economics";
    }
    else if($subject=="DC")
    {
       $table1="dc";
    }
   else if($subject=="AC")
    {
       $table1="ac";
    }
   else if($subject=="Data_Structure")
    {
       $table1="data_structure";
    }
   else if($subject=="Compiler_Design")
    {
       $table1="compiler_design";
    }
  else  if($subject=="Algorithms")
    {
       $table1="algorithms";
    }
   else if($subject=="Accounting")
    {
       $table1="accounting";
    }
    
    
    
    $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $username=$_SESSION["username"];

        echo "<table id='id1' class='center' style = 'position:fixed; right:100px; top:300px;'>"; echo "<tr id='id1'><th id='id2'>Serial</th><th id='id2'>Student name</th><th id='id2'>Witten</th><th id='id2'>Quiz</th><th id='id2'>Attendemce_performance</th><th id='id2'>Total_Marks</th><th id='id2'>Grade</th></tr>";
        
        $sql=$connectionstring->query("SELECT * FROM $table1");

        while($row=$sql->fetch_assoc())
        {
            echo "<tr id='id1'><td id='id2'>".$row["serial"]."</td><td id='id2'>".$row["username"]."</td><td id='id2'>".$row["written"]."</td><td id='id2'>".$row["quiz"]."</td><td id='id2'>".$row["attendence_performance"]."</td><td id='id2'>".$row["total"]."</td><td id='id2'>".$row["grade"]."</td></tr>";
        
            echo "<br>";
        }
        echo  "</table>";  
        $connectionstring->close(); ?>


</body>
</html>