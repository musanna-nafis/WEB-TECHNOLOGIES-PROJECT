<html>
 <body>
     <head>
        <link rel="stylesheet" type="text/css" href="../css/teacher/teacher.css">
</head></html>

<?php
include("../model/teacher_db_model.php");
session_start();

$msg="";




if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 
$username=$_SESSION["username"];
      $table="leave_applications";
      $mydata=new db();
      $connectionstring=$mydata ->OpenCon();
      $sql=$mydata ->LeaveRequest($connectionstring,$table,$username);
     if($sql===TRUE)
     {
        
         $msg="Request sent";

     }
        else
        {
          echo "Error: ".$sql."<br>".$connectionstring-->error;
        }
   echo"<td id=success>";
    echo $msg;
    echo"</td>";
        $mydata->CloseCon($connectionstring);
}
?>