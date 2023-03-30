<?php
include("../model/teacher_db_model.php");
$ok=true;
$vusername="";
$msg="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_REQUEST["username"];
    $vp=$_REQUEST["step"];

    if(empty($username)){
        $vusername="You must enter username"."<br>";
        $ok=false;
      }
    

    if($vp[0]=='1' && $ok==true)
    {
       
        $table="leave_applications";
        $status="pending";

        $mydata=new db();
        $connectionstring=$mydata ->OpenCon();
        $sql=$mydata ->FindTeacherForLeave($connectionstring,$table,$username,$status);
        if($sql->num_rows > 0)
        {

        
        $sql0=$mydata ->UpdateStatusForLeave($connectionstring,$table,$username);
        $sql1=$mydata ->UpdateStatusForLeave1($connectionstring,$username);
        $sql2=$mydata ->UpdateStatusForLeave2($connectionstring,$username);

        if($sql1 && $sql2 && $sql0)
         {
             $msg="Teacher leave application approved";
                     
         }
         else{
            $msg="Leave application error";
         }
        }
        else{
            $vusername="No teacher found";
        }

        $mydata->CloseCon($connectionstring);
    }


        else if($vp[0]=='2' && $ok==true)
        {
            $msg="Teacher leave application rejected";
    
        }
         

    }
   


?>