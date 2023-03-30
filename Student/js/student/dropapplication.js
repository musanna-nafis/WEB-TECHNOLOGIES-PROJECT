function MyAjaxFunc()
{
var courselist=document.getElementById("courselist").value; 


var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("demo").innerHTML = this.responseText;
        }
        else
        {
            document.getElementById("demo").innerHTML = this.status;
        }
    };
    xhttp.open("POST", "../control/student_dropapplication_control.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send("courselist="+courselist);

    }


   
