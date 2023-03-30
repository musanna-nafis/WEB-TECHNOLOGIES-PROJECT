<?php
session_start();
include "../control/student_homepage_control.php";
//include "../control/student_dropapplication_control.php";


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
 <div class="academics"><h3>Drop Application</h3></div>
</div>

<body>
 
 


 
 Select a subject

    <select id="courselist" name="courselist">
    <option value="Algorithms">Algorithms</option>
    <option value="Data_Structure">Data_Structure</option>
    <option value="Compiler_Design">Compiler_Design</option>
    <option value="Web_Technologies">Web_Technologies</option>
    <option value="DC">DC</option>
    <option value="AC">AC</option>
    <option value="Accounting">Accounting</option>
    <option value="Economics">Economics</option>
    </select>


   
    <input type="submit" class="drop" onclick="return MyAjaxFunc()"  value="Drop">
    <h2 id="demo"></h2>
<script src="../js/student/dropapplication.js">
</script> 


  <?php echo "<center class=tsz>My Courses</center>";

  $hcourse="";
  if($c>0){
    echo "<table class=center><tr><th>ID</th><th>Course Name</th><th>Course Teacher</th><th>Department</th><th>Student Count</th></tr>";
     $arrlength1 = count($hcourses);
    for($x = 0; $x < $arrlength1; $x++) {
      $hcourse=$hcourses[$x];
     
      $sql=$connectionstring->query("SELECT * FROM subjects WHERE course_name= '$hcourse'");
      if($sql->num_rows > 0)
      {
       
      
          $row=$sql->fetch_assoc();
         
          echo "<tr><td>".$row["id"]."</td><td>".$row["course_name"]."</td><td>".$row["course_teacher"]."</td><td>".$row["department"]."</td><td>".$row["student_count"]."</td></tr>";
    
          echo "<br>";
    }
}
    
  }
  else{echo"<br>"; echo"No course available";}  echo "</table>";  
  
  $connectionstring->close();
  ?>
 


</body>
</html>