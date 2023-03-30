<?php
include("../model/teacher_db_model.php");
$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_SESSION["username"];
    $table="subjects";
    $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $sql=$mydata ->TeacherAssignResult($connectionstring,$table,$username);

    if($sql->num_rows > 0)
    {
        $_SESSION["resultcourse"]=$_REQUEST["step"];
        header("Location:../view/teacher_studentresult_view.php");

    }
    else
    {
       $msg="You are not a teacher of this course"; 

    }

    $mydata->CloseCon($connectionstring);
}
?>