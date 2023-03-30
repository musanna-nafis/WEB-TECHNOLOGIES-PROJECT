<?php
include("../model/teacher_db_model.php");
$ok=true; 
$vusername="";
$vmsg="";
$omoa="";


if($_SERVER["REQUEST_METHOD"]=="POST"){

$name1=$_REQUEST["username"];

if(empty($name1)){
    $vusername="You must enter username"."<br>";
    $ok=false;
  }

  else if($name1==$_SESSION["username"])
  {
      $vusername="You can not take a subject";
      $ok=false;
  }

  else{

    if (is_numeric($name1)){
        $vusername="Enter an valid username"; 
        $ok=false;
    }
    else{
          $table="users";
          $access_status="active";
          $mydata=new db();
          $connectionstring=$mydata ->OpenCon();
          $sql=$mydata ->FindTeacherForAssign($connectionstring,$table,$name1,$access_status);
          if($sql->num_rows > 0)
           {
                $row=$sql->fetch_assoc();
                $myuser=$row["user_type"];
                if($myuser!="teacher")
                {
                    $vusername="There are no teacher under this username";
                    $ok=false;
                }
           }
           else
           {
            $vusername="There are no teacher under this username";
            $ok=false;
           }

           $mydata->CloseCon($connectionstring);
    }
    

  }
  $sub=$_REQUEST["step"];
  if($sub[0]=='1')
  {
      $subjectname="Algorithms";
  }
  else if($sub[0]=='2')
  {
      $subjectname="Data_Structure";
  }
  else if($sub[0]=='3')
  {
      $subjectname="Compiler_Design";
  }
  else if($sub[0]=='4')
  {
      $subjectname="Web_Technologies";
  }
  else if($sub[0]=='5')
  {
      $subjectname="DC";
  }
  else if($sub[0]=='6')
  {
      $subjectname="AC";
  }
  else if($sub[0]=='7')
  {
      $subjectname="Accounting";
  }
  else if($sub[0]=='8')
  {
      $subjectname="Economics";
  }



if($ok==true)
    {
        $mydata=new db();
        $connectionstring=$mydata ->OpenCon();
        $table="subjects";
        $sql=$mydata ->FindSubject($connectionstring,$table,$subjectname);
        if($sql->num_rows > 0)
          {
              $row=$sql->fetch_assoc();
              $department=$row["department"];
              $count=$row['student_count'];
              $teacher=$row["course_teacher"];
              if($teacher==NULL)
              {
                $sql1=$mydata ->UpdateCourseTeacher($connectionstring,$name1,$subjectname);
                if($sql1)
                  {
                      $omoa="Teacher Assigned";
                      //header("Location:../view/login_view.php");
                  }
                 else
                 {
                     echo "Error: ".$sql."<br>".$connectionstring-->error;
                 }
              }
              else
                {
                    $vmsg="Already one teacher assign in this subject";
                }
             
          }
          
          $mydata->CloseCon($connectionstring);
    }

}
?>