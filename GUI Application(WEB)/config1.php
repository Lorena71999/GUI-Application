<?php

$serverName = "ASUS\SQLEXPRESS";
$connectionInfo = array( "Database"=>"Proiect");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


 
/*if( $conn )
 {
   echo "Connection established.<br />";
}else{
   echo "Connection could not be established.<br />";
}
   die( print_r( sqlsrv_errors(), true));

*/

      $a1 = $_POST['uname'];
      $a2 = $_POST['psw'];
      $sql= "SELECT * FROM Dealer WHERE nume_dealer = '$a1' AND CNP_dealer = '1111111111' ";//datele pentru admin, se logheaza cu cnp si numele de familie!!
      $result = sqlsrv_query($conn,$sql);
      $check = sqlsrv_fetch_array($result);
      if(isset($check)  && $a2 = '1111111111'){
         echo 'ok';
        }else{
           header("location: index1.php");
           echo 'Failure, try again :(';
        }
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#4c4c20 ;
  overflow-x: hidden;
  padding-top: 16px;
}

/* Style sidebar links */
.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  font-size:24px;
  font-family:Roboto;
}

/* Style links on mouse-over */
.sidebar a:hover {
  color:#358282;
}

/* Style the main content */
.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

/* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.container {
  position: relative;
  text-align: center;
  color:white;
   
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size:70px;
  color:white;
   
 
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* Full height */
  height: 200%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size:cover;
  width:100%;
  height:110%;
}

/* Images used */
.img1 { background-image: url("img12.jpg"); }
.img2 { background-image: url("img22.jpg"); }
.img3 { background-image: url("img33.jpg"); }

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  font-size: 40px;
  border: 10px solid #f1f1f1;
  position: fixed; /* Stay fixed */
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 370px;
  padding: 40px;
  text-align: center;
}

</style>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form>
<div class="sidebar">
  <a href="newAdmin.php"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="formular.php"><i class="fa fa-fw fa-wrench"></i>Insert</a>
  <a href="update.php"><i class="fa fa-fw fa-wrench"></i>Update</a>
  <a href="delete.php"><i class="fa fa-fw fa-trash"></i>Delete</a>
  <a href="logout.php"><i class="fa fa-fw fa-user"></i>Log Out</a>
</div>
 <div class="bg-image img1"></div>
 <div class="bg-image img2"></div>
 <div class="bg-image img3"></div>
 <div class="bg-text">HELLO!</div>
 </form>
</body>
</html> 
