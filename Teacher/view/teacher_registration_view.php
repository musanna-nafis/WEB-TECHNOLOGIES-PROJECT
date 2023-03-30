<?php 
session_start();

include "../control/Teacher_registrationvalidation_control.php"; 


if(!isset($_SESSION['usertype']) || $_SESSION['usertype']!="Teacher")
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
<body>
    <head>
<title>
           Teacher | Registration
        </title>
        <link rel="stylesheet" type="text/css" href="../css/teacher/teacher.css">
</head>
 <div class="form-wrap">
    <form action="" onsubmit="return myValidation()" method="POST">
    
    <h1>Registration For Teacher</h2><hr/>
    <p id="wrong" class="colorfm1"></p>
    <p id="colorfm"><?php echo $vusername; ?></p>

            <input type="text" id="fname" name="fname" placeholder=" First Name">
            <input type="text" id="lname" name="lname" placeholder="Last Name">
            <input type="text" id="username" name="username" placeholder="Username">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Password">
            <table><tr><td id="colorfm">Male</td><td>
            <input type="radio" name="gender" id="gender1" value="Male"> </td><td id="colorfm">Female</td><td>
            <input type="radio" name="gender" id="gender2" value="Female"> </td></tr></table>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile Number">       
            <input type="date" id="date" name="date">
                <select id="designation" id="designation" name="designation">
                <option value="Director">Director</option>
                <option value="Professor">Professor</option>
                <option value="Assistant Professor">Assistant Professor</option>
                <option value="Associate Professor">Associate  Professor</option>
                <option value="Lecturer">Lecturer</option>    
            <input type="submit" value="Insert Data">
</form>
</div>
<script type="text/javascript" src="../js/teacher/teacher.js"></script>
</body>
</html>