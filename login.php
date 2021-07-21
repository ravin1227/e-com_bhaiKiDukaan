<?php 
require ('connection.inc.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SignUp</title>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>

<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
  </div>
</div>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="register_submit.php"  method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input id="name" name="name" type="text" placeholder="Name" />
                <input id="email" type="text" name="email" placeholder="Email" />
                <input id="password" type="password" name="password" placeholder="Password" />
                <button  type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login_session.php" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input id="loginemail" name="loginemail" type="text" placeholder="Your Email" />
                <input id="loginpassword" name="loginpassword" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button  type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="#">Ravin</a>
            - Stay here to get more stuffs like this
            <a target="_blank" href="#">click here to know more</a>.
        </p>
    </footer>
    
</body>
<script type="text/javascript" src="js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>


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
//     var text=document.getElementById("signupname").value;
//     var text=document.getElementById("signuppassword").value;

//     if(signupname.value.trim()=="")
//     {
//         alert("Enter a valid name");
//         return false;
//     }
//     else if(signupname.value.trim().length<=5)
//     {
//         alert("Enter a valid name");
//         return false;
//     }
//     else if(signuppassword.value.trim()=="")
//     {
//         alert("Enter a valid password");
//         return false;
//     }
//     else if (signuppassword.value.trim().length<=5)
//     {
//         alert("Enter a valid password");
//         return false;
//     }
//     else{
//         alert("signup successful");
//         return true;
//     }
     
// }

// function signupvalidation(){
//     var text=document.getElementById("signupemail").value;
//     var regx=/^([a-zA_Z0-9 \. -]+)@([a-zA-Z0-9]+)(\.)([a-z]{2,8})(.[a-z]{2,4})?$/;

//     if (regx.test(text)){
//             alert("successful");
//             return true;
//         }
//         else{
//             alert("unccessful");
//             return false;
//         }

//     }


// function loginValidation()
// {
//     var username=document.getElementById("username");
//     var password=document.getElementById("loginpassword");


//     if(username.value.trim()=="")
//     {
//         alert("Enter a Valid Username");
//         // alert("Blank Space Not Allowed");
//         //username.style.border="solid 2px red";
//         //document.getElementById("lbluser").style.visibility="visible";
//         return false;
//     }
//     else if(username.value.trim().length<=5){
//         alert("Enter a Valid Username");
//         // alert("Username Must Contain More than 5 letters");
//         //document.getElementById("lbluser").style.visibility="visible";
//         //username.style.border="solid 2px red";
//         return false;
//     }
//     else if( loginpassword.value.trim()=="")
//     {
//         alert("Enter a Valid Password");
//         // alert("BLANK  field");
//         //document.getElementById("lblpass").style.visibility="visible";
//         //password.style.border="solid 2px red";
//         return false;
//     }
//     else if(loginpassword.value.trim().length <=5)
//     {
//         alert("Enter a Valid Password");
//         // alert("PAssword is too Small")
//         //document.getElementById("lblpass").style.visibility="visible";
//         //password.style.border="solid 2px red";
//         return false;
//     }
//     else if(username.value==loginpassword.value)
//     {
//         alert("Username And Passwored are same");
//         return false;
//     }
    
//     else{
//         alert("Login Successful")
//         return true;

//     }
// }
</script>
