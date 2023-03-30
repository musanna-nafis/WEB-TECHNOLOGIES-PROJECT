<?php
session_start();

 include "../control/student_registrationvalidation_control.php";
if(!isset($_SESSION['usertype']) || $_SESSION['usertype']!="Student")
{
    
    header("Location:login_view.php");
}

if(isset($_SESSION["username"])  && isset($_SESSION["password"]))
{
    if($_SESSION["user_type"]=='admin')
    {
        header("Location:admin_homepage_view.php");
    }
    else if($_SESSION["user_type"]=="teacher")
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
        header("Location:student_homepage_view.php");
    }
    else if($_SESSION["user_type"]=="librarian")
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
<center ><p class="validcolor" id="error"></p></center>
 
 <div class="form-wrap" ><center class=tsz><b><i>Create a New Account</i></b></center>
 <form action=""  method="POST" onsubmit="return validate()">
 <p id="error"></p>
 
 <div class="formdes" >

 
      
        <input type="text"class=tsz name="fname" id="fname"  placeholder="First name">
       
    <!-- <br><?php echo  $vvalidatename; ?> -->
       
       


       <input type="text" class=tsz id="lname" name="lname"  placeholder="Last name" >
    
     <!-- <br><?php echo  $vvalidatelname; ?> -->
       



        <input type="text" class=tsz id="uname" name="uname" placeholder="Username">    
     <!-- <?php echo   $vusername; ?> -->

      
      <br> Date of Birth:
      <input type="date" class=tsz  id="date_of_birth" name="date_of_birth">
    <!-- <br><?php echo  $vvalidatedob; ?> -->
       
  <br> Gender:
    
    <input type="radio" id="gender1" name="gender" value="Male"> Male
    <input type="radio" id="gender2" name="gender"  value="Female"> Female
<!-- <br><?php echo  $vvalidateradio; ?> -->

   
       


       <input type="password" class=tsz id="password" name="password" placeholder="Password">
        
 <!-- <br> <?php echo  $vpassword; ?> -->



       <input type="email" class=tsz id="email" name="email" placeholder="Email"><br>
     <!-- <br><?php echo  $vvalidateemail; ?> -->


        <input type="phone"class=tsz  id="phone" name="phone" placeholder="Phone Number">
     <!-- <br><?php echo  $vvalidatephone; ?> -->

     <br>Select a Department:

  <select   name="department">
    <option value="cse"  id="cse" >CSE</option>
    <option value="eee" id="eee" >EEE</option>
    <option value="bba" id="bba" >BBA</option>
  <!-- <br>  <?php echo  $vvalidatedept ?> -->
  </select>



  <br>Select a Program:
    
    <input type="radio" id="program1" name="program" value="Graduate"> Graduate
    <input type="radio" id="program2" name="program" value="Undergraduate"> Undergraduate
   <!-- <br> <?php echo  $vvalidateprogram; ?>  -->
  
   
  
   


  
<br><br><input type="submit" name="submit" class="regbutton" value="Create">

  </div>                
</div>







            </form>
            <script type="text/javascript" src="../js/student/student.js"></script>
        </body>
    
</html>
