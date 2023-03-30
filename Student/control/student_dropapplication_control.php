<?php
session_start();
include("../model/student_db_model.php");
$coursename=""; $table1=""; $msg2="";
if((!empty($_REQUEST["courselist"]))){
    
    $coursename=$_REQUEST["courselist"];
 
   $username=$_SESSION["username"];
    if($_REQUEST["courselist"]=="Web_Technologies")
    {
       $table1="web_technologies";
       $course="Web_Technologies";
    }
    else if($_REQUEST["courselist"]=="Economics")
    {
       $table1="economics";
       $course="Economics";
    }
    else if($_REQUEST["courselist"]=="DC")
    {
       $table1="dc";
       $course="DC";
    }
   else  if($_REQUEST["courselist"]=="AC")
    {
       $table1="ac";
       $course="AC";
    }
   else  if($_REQUEST["courselist"]=="Data_Structure")
    {
       $table1="data_structure";
       $course="Data_Structure";
    }
   else  if($_REQUEST["courselist"]=="Compiler_Design")
    {
       $table1="compiler_design";
       $course="Compiler_Design";
    }
  else   if($_REQUEST["courselist"]=="Algorithms")
    {
       $table1="algorithms";
       $course="Algorithms";
    }
   else  if($_REQUEST["courselist"]=="Accounting")
    {
       $table1="accounting";
       $course="Accounting";
    }
    $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    
    
    $sql=$connectionstring->query("SELECT * FROM $table1 WHERE username='$username'");

   
    if($sql->num_rows>0)
      {
       
      
        $sql2="INSERT INTO drop_request(username,course,status) VALUES('$username','$course','pending')";
                      if($connectionstring->query($sql2)==TRUE)
                        {
                        
                       echo"Drop application sent!";
                            
                        }
                      
                    }
    else{
       echo"This course is not registered";

                    }

                    $mydata->CloseCon($connectionstring);  }
                    ?>