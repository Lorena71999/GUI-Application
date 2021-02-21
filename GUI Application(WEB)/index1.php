<?php
if(isset($_POST['b'])){
header("Location:FORM.php");
}
?>

<html>
<style>
.container {
  position: relative;
  text-align: center;
  color:black;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
 
}
 .button { 
       
		float:Bottom-left;
		clear: both;
		margin:auto;
		display: block;
		width: 150px;
        height: 50px;
        padding: 14px 18px; 
        background-color:red; 
		border-radius: 23px;
		color: white;
		font-family: Roboto;
		border:none;
		box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);
		font-size:20px;
    } 
</style>
<body>
   <form action = " " method = "post">
   <div class="container">
   <img src="preview.jpg" width="1000" height="490" title="Logo of a company" alt="Logo of a company">
   <button class="button" name = "b">Cancel</button> 
 </div>
 </form>
 </body>
 
</html>

