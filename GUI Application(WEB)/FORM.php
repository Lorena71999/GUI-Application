<html>
<head>
<title>Login</title>
<link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');
form {
 
    position: relative;
    z-index: 5;
	background-color: #b3b8cd;
    max-width: 300px;
    margin: 0 auto 45px;
    padding: 16px;
	box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);
	border-radius: 30px;
	
}

/* Full-width inputs */
 input[type=text], input[type=password] {
  width: 10%;
  float: center;
  clear: both;
  padding: 10px 10px;
  margin: 8px 5px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 23px;
  align = "left";
  width: 270px;
  height: 45px;
}

/* Set a style for all buttons */
.button {
  
    border:none;
    float:center;
	clear: both;
    padding: 14px ;
    text-align: center;
	width: 150px;
    height: 40px;
    font-family: Roboto;
    display: block;
    margin: 0 auto;
	color: white;
    cursor:e-resize;
    border-radius: 23px;
    background-color:#8162CE;
	box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);

	; 
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.3;
}



/* Center the avatar image inside this container */
.imgcontainer {
   text-align: center;
   margin: 20px 0 20px 0;
}

/* Avatar image */
img.avatar {
   width: 40%;
   border-radius: 100px;
  
}

/* Add padding to containers */
.container {
  padding: 10px;
}

/* The "Forgot password" text */
span.psw {
	
   float: right;
   padding-top: 20px;
    color: white;
}


body {
    font-family: 'Adamina';font-size: 16px;
	background: #ecf0f1; /* fallback for old browsers */
    font-family: "Roboto", sans-serif;
   -webkit-font-smoothing: antialiased;
   -moz-osx-font-smoothing: grayscale;    
    background-color: #28223f;
    font-family: Roboto;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;  
}
    .cancelbtn { 
       
		float:center;
		clear: both;
		margin:auto;
		display: block;
		width: 150px;
        height: 40px;
        padding: 14px 18px; 
        background-color:#8162CE; 
		border-radius: 23px;
		color: white;
		font-family: Roboto;
		border:none;
		box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);
    } 
  </style>
  <body>

	
    <form action="config1.php" method="post">
    <div class="imgcontainer">
    <img src="ppp.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <button class="button">Login</button>
    </div>
	
   <div class="container" style="background-color:#b3b8cd"> 
            <span class="psw">Forgot <a href="#">password?</a></span> 
    </div> 
</form>
</body>
</html>