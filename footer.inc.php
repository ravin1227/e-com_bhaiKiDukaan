</div>
<!-- footer  area-->

<!-- <div class="container">
  <hr/>
  <div class="row">
    <div class="col-md-7 m-auto">
      <form>
        <section><h3>sign up and get a change to win the giveaway of the week.</h3></section>
       <div class="input-group">
           <input type="text" class="form-control" placeholder="Enter your email id">
           <button class="btn btn-success" type="submit">SUBSCRIB</button>
         </div>
      </form>
   </div>
  </div>

  <hr/>
</div> -->

<div class="container-fluid footer">
  <div class="row" style="background-color:#2F4858;">
  <div class="col-4 about_us">
    <a href="aboutus.html"><h5>About Us</h5></a>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
      industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type a
      nd scrambled it to make a type specimen.
    </p>
  </div>
  <div class="col-2 footer_links">
    <h5>Useful Links</h5>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="aboutus.html">About Us</a></li>
      <li><a href="contactus.html">Contact Us</a></li>
      <li><a href="stores.html">Store Location</a></li>
      <li><a href="customorder.html">Custom/Bulk Order</a></li>
    </ul>
  </div>
  <div class="col-2 footer_links">
    <h5>Profile</h5>
    <ul>
      <li><a href="index.html">Your Acount</a></li>
      <li><a href="bulkorder.html">Manage Address</a></li>
      <li><a href="checkout.html">Your Orders</a></li>
      <li><a href="contactus.html">Track Order</a></li>
      <li><a href="location.html">Wishlist</a></li>
      
    </ul>
  </div>
  <div class="col-4">
    <h5>Registered Office Address:</h5>
    <section>
      <p>
        Shiv Shakti Furnitures,<br>
        Near BSNL Office,<br>
        Bharwara, Darbhanga-835217,<br>
        Bihar.<br>
        CIN:45464545645<br>
        Telephone:7903097845<br>
      </p>
    </section>
  </div>
  </div>
</div>
   
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script>
  window.onscroll = function() {myFunction()};
  
  var category_bar_stick = document.getElementById("category_bar_stick");
  var sticky = category_bar_stick.offsetTop;
  
  function myFunction() {
    if (window.pageYOffset >= sticky) {
      category_bar_stick.classList.add("sticky")
    } else {
      category_bar_stick.classList.remove("sticky");
    }
  }
</script>


<!-- <script>
  $(document).ready(function(){
      setTimeout(function(){
        $('#exampleModal').modal('show');
      },5000);
   }); 
</script>


<script type="text/javascript">

   const signUpButton = document.getElementById('signUp');
   const signInButton = document.getElementById('signIn');
   const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
   container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
   container.classList.remove("right-panel-active");
});

// function signupvalidation()
// {
//    var text=document.getElementById("signupname").value;
//    var text=document.getElementById("signuppassword").value;

//    if(signupname.value.trim()=="")
//    {
//        alert("Enter a valid name");
//        return false;
//    }
//    else if(signupname.value.trim().length<=5)
//    {
//        alert("Enter a valid name");
//        return false;
//    }
//    else if(signuppassword.value.trim()=="")
//    {
//        alert("Enter a valid password");
//        return false;
//    }
//    else if (signuppassword.value.trim().length<=5)
//    {
//        alert("Enter a valid password");
//        return false;
//    }
//    else{
//        alert("signup successful");
//        return true;
//    }
    
// }

// function signupvalidation(){
//    var text=document.getElementById("signupemail").value;
//    var regx=/^([a-zA_Z0-9 \. -]+)@([a-zA-Z0-9]+)(\.)([a-z]{2,8})(.[a-z]{2 ,4})?$/;

//    if (regx.test(text)){
//            alert("successful");
//            return true;
//        }
//        else{
//            alert("unccessful");
//            return false;
//        }
//  }


function loginValidation()
{
   var username=document.getElementById("username");
   var password=document.getElementById("loginpassword");


   if(username.value.trim()=="")
   {
       alert("Enter a Valid Username");
       // alert("Blank Space Not Allowed");
       //username.style.border="solid 2px red";
       //document.getElementById("lbluser").style.visibility="visible";
       return false;
   }
   else if(username.value.trim().length<=5){
       alert("Enter a Valid Username");
       // alert("Username Must Contain More than 5 letters");
       //document.getElementById("lbluser").style.visibility="visible";
       //username.style.border="solid 2px red";
       return false;
   }
   else if( loginpassword.value.trim()=="")
   {
       alert("Enter a Valid Password");
       // alert("BLANK  field");
       //document.getElementById("lblpass").style.visibility="visible";
       //password.style.border="solid 2px red";
       return false;
   }
   else if(loginpassword.value.trim().length <=5)
   {
       alert("Enter a Valid Password");
       // alert("PAssword is too Small")
       //document.getElementById("lblpass").style.visibility="visible";
       //password.style.border="solid 2px red";
       return false;
   }
   else if(username.value==loginpassword.value)
   {
       alert("Username And Passwored are same");
       return false;
   }
   
   else{
       alert("Login Successful")
       return true;

   }
}
</script> -->
</html>