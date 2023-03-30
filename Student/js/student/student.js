function validate()
{
    var fname=document.getElementById("fname").value;
    var lname=document.getElementById("lname").value;
    var uname=document.getElementById("uname").value;
    var dob=document.getElementById( "date_of_birth").value;
    var tt =/^[a-zA-Z ]*$/;
    var res1 = tt.test(fname);
    var res2 = tt.test(lname);
    
    var password=document.getElementById("password").value;
    
  var phone=document.getElementById( "phone").value;
    var email=document.getElementById("email").value;
    var tt1 = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
    var res4 = tt1.test(email);
    var ok=true;
   

    if(fname== "")
    {
        document.getElementById("error").innerHTML="You must enter your first name";
        ok=false;
        return ok;
    }
if (!res1)
   {
        document.getElementById("error").innerHTML="First name should be alphabet";
        ok=false;
       return ok;
   }
   if(fname.length<5)
   {
       document.getElementById("error").innerHTML="First Name is too short";
       ok=false;
       return ok;
   }
   
   if(lname== "")
   {
       document.getElementById("error").innerHTML="You must enter your last name";
       ok=false;
       return ok;
   }
   if (!res2)
   {
        document.getElementById("error").innerHTML="Last name should be alphabet";
        ok=false;
       return ok;
   }
   if(lname.length<5)
   {
       document.getElementById("error").innerHTML="Last Name is too short";
       ok=false;
       return ok;
   }
   if(uname== "")
   {
       document.getElementById("error").innerHTML="You must enter your username";
       ok=false;
       return ok;
   }
  
   if(uname.length<3)
   {
       document.getElementById("error").innerHTML="Usernme is too short";
       ok=false;
       return ok;
   }

   if(dob==="")
   {
       document.getElementById("error").innerHTML="You must enter your age";
       ok=false;
       return ok;
   }
   if (document.getElementById("gender1").checked== false && document.getElementById("gender2").checked== false)
   {
        document.getElementById("error").innerHTML=" Please select your gender";
        ok=false;
        return ok;
   }
   if(password== "")
   {
       document.getElementById("error").innerHTML="You must enter password";
       ok=false;
       return ok;
   }
   if(password.length<8)
   {
       document.getElementById("error").innerHTML="Password should be at least 8 characters in length";
       ok=false;
       return ok;
   }
   if(email== "")
   {
       document.getElementById("error").innerHTML="You must enter email";
       ok=false;
       return ok;
   }
   if(!res4)
   {
        document.getElementById("error").innerHTML="Enter a valid email";
        ok=false;
       return ok;
   }
   
   if(phone== "")
   {
       document.getElementById("error").innerHTML="You must enter your Phone Number";
       ok=false;
       return ok;
   }
   if(isNaN(phone))
   {
       document.getElementById("error").innerHTML="Phone number should be numeric";
       ok=false;
       return ok;
   }

if (document.getElementById("program1").checked== false && document.getElementById("program2").checked== false)
{
     document.getElementById("error").innerHTML=" Please select a program";
     ok=false;
     return ok;
}


return true;


}