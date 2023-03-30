function myValidation()
{

   var fname=document.getElementById("fname").value;
   var lname=document.getElementById("lname").value;
   var username=document.getElementById("username").value;
   var email=document.getElementById("email").value;
   var password=document.getElementById("password").value;
   var mobile=document.getElementById("mobile").value;
   var date=document.getElementById("date").value;
   var designation=document.getElementById("designation").value;
   var my = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
   var count=0;
   


   if(fname=="")
   {
       document.getElementById("wrong").innerHTML="Please enter your first name";
       count++;
       return false;
   }
   if(fname.length<4)
   {
       document.getElementById("wrong").innerHTML="First name should not less than 4 character";
       count++;
       return false;
   }
   var my1 =/^[a-zA-Z ]*$/;
   if (!my1.test(fname))
   {
        document.getElementById("wrong").innerHTML="First name should be alphabet";
        count++;
        return false;
   }

   if(lname=="")
   {
       document.getElementById("wrong").innerHTML="Please enter your last name";
       count++;
       return false;
   }
   if(lname.length<4)
   {
       document.getElementById("wrong").innerHTML="Last name should not less than 4 character";
       count++;
       return false;
   }
   var my2 =/^[a-zA-Z ]*$/;
   if (!my2.test(lname))
   {
        document.getElementById("wrong").innerHTML="Last name should be alphabet";
        count++;
        return false;
   }

   if(email=="")
   {
       document.getElementById("wrong").innerHTML="Email can not be empty";
       count++;
       return false;
   }
   if(!my.test(email))
   {
        document.getElementById("wrong").innerHTML="Email is not valid";
        count++;
        return false;
   }

   if(password=="")
   {
       document.getElementById("wrong").innerHTML="You must enter password";
       count++;
       return false;
   }
   if(password.length<8)
   {
       document.getElementById("wrong").innerHTML="Password should be at least 8 characters";
       count++;
       return false;
   }

   if(username=="")
   {
       document.getElementById("wrong").innerHTML="You must enter username";
       count++;
       return false;
   }

   if(username.length<5)
   {
       document.getElementById("wrong").innerHTML="Username should be at least 5 characters";
       count++;
       return false;
   }
   if(!isNaN(username))
   {
       document.getElementById("wrong").innerHTML="Username is not valid";
       count++;
       return false;
   }

   if(mobile=="")
   {
       document.getElementById("wrong").innerHTML="You must enter mobile number";
       count++;
       return false;
   }
   if(mobile.length!=11)
   {
       document.getElementById("wrong").innerHTML="Mobile number should be 11 digit";
       count++;
       return false;
   }
   if(isNaN(mobile))
   {
       document.getElementById("wrong").innerHTML="Mobile number should be collection of digit";
       count++;
       return false;
   }
   if(date==="")
   {
       document.getElementById("wrong").innerHTML="You must enter Birth date";
       count++;
       return false;
   }

    if(designation=="")
   {
       document.getElementById("wrong").innerHTML="You must enter designation";
       count++;
       return false;
   }
   
   if (document.getElementById("gender1").checked==false && document.getElementById("gender2").checked==false)
   {
        document.getElementById("wrong").innerHTML="Please select your gender";
        count++;
        return false;
   }

 
  

     return true;
}