<?php

$myid="";$myfirstname="";$mylastname="";$mygender="";$myaccessstatus="";$myusername="";$myemail="";$myphone="";$mydob="";$mydesignation="";
include "../model/teacher_db_model.php";

$table="teachers";

$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$sql=$mydata ->viewprofile($connectionstring,$table);
if($sql->num_rows > 0)
{
 
    $row=$sql->fetch_assoc();
    $myid=$row["id"];
    $myfirstname=$row["first_name"];
    $mylastname=$row["last_name"];
    $mygender=$row["gender"];
    $myaccessstatus=$row["access_status"];
    $myusername=$row["username"];
    $myemail=$row["email"];
    $myphone=$row["phone"];
    $mydob=$row["dob"];
    $mydesignation=$row["designation"];
    /*
    echo "<tr><td>Teacher  Id : <tr> <td>".$row["id"]."</td></tr><br>";
    echo "<tr><td>Name : <tr> <td>".$row["first_name"]." ".$row["last_name"]."</td></tr><br>";
    echo "<tr><td>Gender : <tr> <td>".$row["gender"]."</td></tr><br>";
    echo "<tr><td>Access Status : <tr> <td>".$row["access_status"]."</td></tr><br>";
    echo "<tr><td>Username : <tr> <td>".$row["username"]."</td></tr><br>";
    echo "<tr><td>Email : <tr> <td>".$row["email"]."</td></tr><br>";
    echo "<tr><td> Contact : <tr> <td>".$row["phone"]."</td></tr><br>";
    echo "<tr><td>DOB : <tr> <td>".$row["dob"]."</td></tr><br>";
    echo "<tr><td>Designation : <tr> <td>".$row["designation"]."</td></tr><br>";
    */
}
$mydata->CloseCon($connectionstring);
?>