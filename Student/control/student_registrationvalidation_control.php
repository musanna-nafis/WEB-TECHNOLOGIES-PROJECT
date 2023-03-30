<?php
include('../model/student_db_model.php'); 
$validatename="";   $validatelname=""; $validateuname=""; $validatedob=""; $validateradio="";$password=""; $validateemail=""; $validatephone="";$validateprogram="";$validatedept="";
$check=0;   $username="";
$vvalidatename="";   $vvalidatelname=""; $vvalidateuname=""; $vvalidatedob=""; $vvalidateradio="";$vpassword=""; $vvalidateemail=""; $vvalidatephone="";$vvalidateprogram="";$vvalidatedept="";
 $vusername="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $fname=$_REQUEST["fname"];
    $lname=$_REQUEST["lname"];
    if(empty($_REQUEST["fname"]))
{
   

}
    else if (!preg_match("/^[a-zA-Z ]*$/",$fname)){
    
}
if((strlen($_REQUEST["fname"])) <5){
  
      
  
}
else
{
    $validatename=$_REQUEST["fname"];
    $check=$check+1;
}

if(empty($_REQUEST["lname"]))
{
   

}
else if (!preg_match("/^[a-zA-Z ]*$/",$lname)){
    
}
else if((strlen($_REQUEST["lname"])) <5){
  
      
  
}
else
{
    $validatelname=$_REQUEST["lname"];
    $check=$check+1;
}

if(empty($_REQUEST["uname"])){
    
  }

  

  else  if((strlen($_REQUEST["uname"])) <3){
  
      
  
    }


    else{
          $table="users";
          $access_status="active";
          $mydata=new db();
          $connectionstring=$mydata ->OpenCon();
          $username= $_REQUEST["uname"]; 
          $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND access_status='".$access_status."'");
          if($sql->num_rows > 0)
           {
               $vusername="Username is already taken try another one";   
             
           }
           else{   $check=$check+1;}
    }
    

  

if(empty($_REQUEST["date_of_birth"]))
{
    

}
else{
    $validatedob=$_REQUEST["date_of_birth"];
    $check=$check+1;
}
if(isset($_REQUEST["gender"]))
{
    $validateradio= $_REQUEST["gender"];
    $check=$check+1;
}
else{
    
}

if(empty($_REQUEST["password"])){
   
    
  }
  else{
    if((strlen($_REQUEST["password"])) <8){
  
      
  
    }
    else{ 
           $password=$_REQUEST["password"];
           $check=$check+1;}
  }

  if(empty($_REQUEST["email"])){
   
  } 
  else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_REQUEST["email"]))
  {
      
  }
  else{
      $validateemail= $_REQUEST["email"];
      $check=$check+1;
  }

  if(empty($_REQUEST["phone"])){
    
}
else if(!is_numeric($_REQUEST["phone"])) {
   
}
else {
    $validatephone=$_REQUEST["phone"];
    $check=$check+1;
}

if(isset($_REQUEST["program"]))
{
    $validateprogram= $_REQUEST["program"];     $check=$check+1;
}
else{
    
}
if(isset($_REQUEST["department"]))
{
    $validatedept= $_REQUEST["department"];    $check=$check+1;
}
}

if($check==10)
    {

        $table="users";
        $mydata=new db(); 
        $connectionstring=$mydata ->OpenCon();
        $sql="INSERT INTO users(access_status,user_type,username,password) VALUES('pending','student','$username','$password')";
       if($connectionstring->query($sql)===TRUE)
       {
          $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND password='".$password."'");
  
          if($sql->num_rows > 0)
            {
                $row=$sql->fetch_assoc();
                $id=$row['id'];
                $sql="INSERT INTO students(id,first_name,last_name,gender,access_status,username,password,email,phone,dob,due_fees,department,program) VALUES($id,'$validatename','$validatelname','$validateradio','pending','$username','$password','$validateemail','$validatephone','$validatedob',0,'$validatedept','$validateprogram')";
               if($connectionstring->query($sql)===TRUE)
                 {
                  
                        header("Location:../view/login_view.php");
                   
                 }
                else
                {
                    echo "Error: ".$sql."<br>".$connectionstring->error;
                }
            }
  
  
       }
          else
          {
            echo "Error: ".$sql."<br>".$connectionstring->error;
          }
          $connectionstring->close();
    
      }


    
    ?>