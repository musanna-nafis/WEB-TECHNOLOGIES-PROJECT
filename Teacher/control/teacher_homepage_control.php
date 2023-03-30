<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/teacher/teacher.css">
</head></html>

<body>
<?php
include "../model/teacher_db_model.php";


function mytable1()
{
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];

    echo "<table><tr><th>ID</th><th>Course Name</th><th>Course Teacher</th><th>Department</th><th>Student_Count</th></tr>";
    
    $sql=$connectionstring->query("SELECT * FROM subjects WHERE course_teacher='$username'");

    while($row=$sql->fetch_assoc())
    {
        echo "<tr><td>".$row["id"]."</td><td>".$row["course_name"]."</td><td>".$row["course_teacher"]."</td><td>".$row["department"]."</td><td>".$row["student_count"]."</td></tr>";
    
          echo "<br>";
    }
    echo  "</table>";  
    $connectionstring->close();


}




if($_SERVER["REQUEST_METHOD"]=="POST"){
    $select=$_REQUEST["step"];
    
    if($select[0]=='1')
    {
        header("Location:../view/teacher_assignresult_view.php"); 
    }
    else if($select[0]=='2')
    {
        header("Location:../view/teacher_droprequest_view.php");
    }
    else if($select[0]=='3')
    {
        header("Location:../view/teacher_leaverequest_view.php");
    }
    else
    {
        header("Location:../view/teacher_postassignment_view.php");
    }
}
?>
</body>
</html>