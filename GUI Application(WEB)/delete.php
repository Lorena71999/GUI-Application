<?php

   $serverName = "ASUS\SQLEXPRESS";
   $connectionInfo = array( "Database"=>"Proiect");
   $conn = sqlsrv_connect( $serverName, $connectionInfo);
   ?>

<?php
 
   
    if(isset($_GET['delete']) && !empty($_GET['model'])){
        $model=$_GET['model'];
		$record1 = sqlsrv_query($conn,"SELECT * FROM Masina WHERE model='$model'");
		$ver1 = sqlsrv_fetch_array($record1);
		    if (isset($ver1)) {
			     $sql="DELETE FROM Masina WHERE model ='$model'";
				  sqlsrv_query($conn, $sql);
				  header("Location:ok1.php");
			}
		    else
			header("Location:wrong.php");
	}
	
 
				
	if(isset($_GET['delete']) && !empty($_GET['nume_client'])){
		$nume_client=$_GET['nume_client'];
		$record2 = sqlsrv_query($conn,"SELECT * FROM Clienti WHERE CONCAT(nume_client,' ',prenume_client)='$nume_client'");
		$ver3 = sqlsrv_fetch_array($record2);
		    if (isset($ver3)) {
			    $sql="DELETE FROM Clienti WHERE  CONCAT(nume_client,' ',prenume_client)='$nume_client'";
			    sqlsrv_query($conn, $sql);
			    header("Location:ok2.php");
			}
		    else
			header("Location:wrong.php");
	}
?>
<html>	
<head>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
form {
     position:0 px;
     z-index: 0;
	 background-color: #b3b8cd;
     max-width: 300px;
     margin:12px 12px;
     padding: 16px;
	 box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);
	 border-radius: 30px;
	
}
 input {
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
}
table, th, td {
   border: 2px solid black;
  background-color:#392544 ;
  color:white;
}
.container {
  width: 600px;
  clear: both;
}

</style>
  <body>
	<form method="GET"  >
	MODEL(MASINA): <input type="text" name="model" >
	<button class="button" name="delete">DELETE</button>
	</form><br/></br>
	<meta charset="utf-8">
      <div class="form">
      <h2 Style:"align = center";>Records(Masini)</h2>
      <table width="100%" border="1" style="border-collapse:collapse" align = "left";>
      <thead>
     <tr>
       <th><strong>MARCA</strong></th>
       <th><strong>MODEL</strong></th>
     </tr>
     </thead>
     <tbody>
<?php

     $sel_query="Select * from Masina ORDER BY id_masina desc;";
     $result = sqlsrv_query($conn,$sel_query);
     while($row = sqlsrv_fetch_array($result)) { ?>
       <td align="center"><?php echo $row["marca"]; ?></td>
       <td align="center"><?php echo $row["model"]; ?></td>
       </tr>
<?php
    }
?>
     </tbody>
     </table>
     </div>
	 
	<form method="GET">
	NUME(CLIENT): <input type="text" name="nume_client" >
	<button class="button" name="delete">DELETE</button>
	</form><br/></br>	
    <div class="form">
    <h2 Style:"align = center";>Records(Clienti)</h2>
	<table width="100%" border="2" style="border-collapse:collapse" align = "left";>
    <thead>
    <tr>
     <th><strong>NUME</strong></th>
     <th><strong>PRENUME</strong></th>
    </tr>
     </thead>
     <tbody>
<?php

     $sel_query="Select * from Clienti ORDER BY id_client desc";
     $result1 = sqlsrv_query($conn,$sel_query);
     while($row = sqlsrv_fetch_array($result1)) { ?>
     <td align="center"><?php echo $row["nume_client"]; ?></td>
     <td align="center"><?php echo $row["prenume_client"]; ?></td>
     </tr>
<?php
    }
?>
     </tbody>
     </table>
     </div>
			
			
</body>			
</head>	
</html>
		