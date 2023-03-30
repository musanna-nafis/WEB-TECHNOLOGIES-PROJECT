<?php
include("../model/teacher_db_model.php");
$ok=true;
$vfname=""; 
$vlname="";
$vusername="";
$vemail="";
$vpassword="";
$vgender=""; 
$vmobile="";
$vdate="";
$vdesignation="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name1=$_REQUEST["fname"];
 
if(empty($name1))
{
    $ok=false;

}
if((strlen($name1)) <4){
  $ok=false;
}
else if (!preg_match("/^[a-zA-Z ]*$/",$name1)){
    $ok=false;
}

$name2=$_REQUEST["lname"];
if(empty($name2))
{
    $ok=false;

}
else if (!preg_match("/^[a-zA-Z ]*$/",$name2)){
    $ok=false;
}
if((strlen($name2)) <4){
  $ok=false;
}

$email=$_REQUEST["email"];
if(empty($email)){
    $ok=false;
  } 
else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
  } else {
    $ok=false;
  }

$password=$_REQUEST["password"];
if(empty($password)){
  $ok=false;
}
else{
  if((strlen($password)) <8){
    $ok=false;
  }
 
}

$username=$_REQUEST["username"];

if(empty($username)){
    $ok=false;
  }
  if((strlen($username)) <5){
    $ok=false;
  }

  else{

    if (is_numeric($username)){
       
        $ok=false;
    }
    else{
          $table="users";
          $access_status="active";
          $mydata=new db();
          $connectionstring=$mydata ->OpenCon();
          $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND access_status='".$access_status."'");
          if($sql->num_rows > 0)
           {
               $vusername="Username is already taken try another one";
               $ok=false;
           }
           $mydata->CloseCon($connectionstring);
    }
    

  }

$mobile=$_REQUEST["mobile"];

if(empty($mobile)){

    $ok=false;
  }
  else
  {
       
     if(!is_numeric($mobile)) {
        
        $ok=false;
    }

    else if(strlen($mobile)!=11)
    {
    
        $ok=false;

    }

  
  }

  $date=$_REQUEST["date"];
  if(empty($date)){

    $ok=false;
  }

  $designation=$_REQUEST["designation"];
  if(empty($designation)){
  
    $ok=false;
  }

  if(isset($_REQUEST["gender"]))
  {
    $gender=$_REQUEST["gender"];
  }


  if(!isset($_REQUEST["gender"])){
  
    $ok=false;
  }



if($ok==true)
    {
      $table="users";
      $mydata=new db();
      $connectionstring=$mydata ->OpenCon();
      $sql="INSERT INTO users(access_status,user_type,username,password) VALUES('pending','teacher','$username','$password')";
     if($connectionstring->query($sql)===TRUE)
     {
        $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND password='".$password."'");

        if($sql->num_rows > 0)
          {
              $row=$sql->fetch_assoc();
              $id=$row['id'];
              $sql="INSERT INTO teachers(id,first_name,last_name,gender,access_status,username,password,email,phone,dob,due_salary,designation) VALUES($id,'$name1','$name2','$gender','pending','$username','$password','$email','$mobile','$date',0,'$designation')";
             if($connectionstring->query($sql)===TRUE)
               {
                   echo "Account created successfully";
                   header("Location:../view/login_view.php");
               }
              else
              {
                  echo "Error: ".$sql."<br>".$connectionstring-->error;
              }
          }


     }
        else
        {
          echo "Error: ".$sql."<br>".$connectionstring-->error;
        }
        $mydata->CloseCon($connectionstring);
    }

}
?>