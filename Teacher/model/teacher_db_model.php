<?php
class db{
 
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "portal";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }

 function viewprofile($conn,$table)
 {
     $result = $conn->query("SELECT * FROM ".$table." WHERE username='".$_SESSION["username"]."' AND password='".$_SESSION["password"]."'");
     return $result;
 }

 function UpdateGrade($conn,$table1,$m1,$m2,$m3,$total,$grade,$username1)
{
    $result = $conn->query("UPDATE $table1 SET  written =$m1,quiz =$m2,attendence_performance =$m3,total=$total,grade='$grade' WHERE username='".$username1."'");
    return $result;
}

function FindStudent($conn,$table1,$username1)
{
    $result = $conn->query("SELECT * FROM ". $table1." WHERE username='". $username1."'");
    return $result;
}

function LeaveRequest($conn,$table,$username)
{
    $result = $conn->query("INSERT INTO $table(username,status) VALUES('$username','pending')");
    return $result;
}

function FindStudentForDrop($conn,$table,$username,$status)
{
    $result = $conn->query("SELECT * FROM ".$table." WHERE username='".$username."' AND status='".$status."'");
    return $result;
}

function FindTeacherForDrop($conn,$table1,$myusername,$position)
{
    $result = $conn->query("SELECT * FROM ".$table1." WHERE course_teacher='".$myusername."' AND course_name='".$position."'");
    return $result;
}

function UpdateStatusForDrop($conn,$table,$username)
{
    $result = $conn->query("UPDATE $table SET status='Dropped' WHERE username='$username'");
    return $result;
}

function UpdateCountForDrop($conn,$count,$position)
{
    $result = $conn->query("UPDATE subjects SET  student_count=$count WHERE course_name='$position'");
    return $result;
}


function DeleteStudent($conn,$table100,$username)
{
    $result = $conn->query("DELETE FROM $table100 WHERE username='$username'");
    return $result;
}


function FindTeacherForLeave($conn,$table,$username,$status)
{
    $result = $conn->query("SELECT * FROM ".$table." WHERE username='".$username."' AND status='".$status."'");
    return $result;
}


function UpdateStatusForLeave($conn,$table,$username)
{
    $result = $conn->query("UPDATE $table SET status='Dropped' WHERE username='$username'");
    return $result;
}


function UpdateStatusForLeave1($conn,$username)
{
    $result = $conn->query("UPDATE users SET access_status='Dropped' WHERE username='$username'");
    return $result;
}

function UpdateStatusForLeave2($conn,$username)
{
    $result = $conn->query("UPDATE teachers SET access_status='Dropped' WHERE username='$username'");
    return $result;
}


function TeacherAssignResult($conn,$table,$username)
{
    $result = $conn->query("SELECT * FROM ".$table." WHERE course_name ='".$_REQUEST["step"]."' AND course_teacher='".$username."'");
    return $result;
}



function FindTeacherForAssign($conn,$table,$name1,$access_status)
{
    $result = $conn->query("SELECT * FROM ".$table." WHERE username='".$name1."' AND access_status='".$access_status."'");
    return $result;
}


function FindSubject($conn,$table,$subjectname)
{
    $result = $conn->query("SELECT * FROM ".$table." WHERE course_name='".$subjectname."'");
    return $result;
}


function UpdateCourseTeacher($conn,$name1,$subjectname)
{
    $result = $conn->query("UPDATE subjects SET course_teacher='$name1' WHERE course_name='$subjectname'");
    return $result;
}





 function check_duplicateusername($conn,$table,$username,$access_status)
{
    $result = $conn->query("SELECT * FROM ".$table." WHERE username='".$username."' AND access_status='".$access_status."'");
    return $result;
}



function CloseCon($conn)
{
    $conn -> close();
}







}
?>