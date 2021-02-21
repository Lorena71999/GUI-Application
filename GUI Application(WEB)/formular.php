<!doctype html>
<html>
<head>
<style>
form {
 
     position: relative;
     z-index: 5;
	 background-color: #b3b8cd;
     max-width: 300px;
     margin: 25px  25px;
     padding: 16px;
	 box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);
	 border-radius: 30px;
	 font-size = 10px;
}
/* Full-width inputs */
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
 button {
  
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
	
body {
 
     font-family: "Roboto", sans-serif;
     background-color: #28223f;
     font-family: Roboto;
     display: flex;
     align-items: center;
     justify-content: center;
     min-height: 100vh;
     margin: 0;  
	
    }
table, th, td {

     border: 2px solid black;
     background-color:#392544 ;
     color:white;
   
  
    }

</style>
</head>
<body>
     <form action="insert.php" method= "POST">
     <h1 style = "font-size:130%;"> MASINA</h1>
     <label>ID:</label><input type = "text" name = "id_masina"><br>
     <label>MARCA:</label><input type = "text" name = "marca"><br>
     <label>MODEL:</label><input type = "text" name = "model"><br>
     <label>CARACTERISTICI:</label><input type = "text" name = "caracteristici"><br>
     <label>PRODUCATOR(ID):</label><input type = "text" name = "id_producator"><br>
     <label>PRET:</label><input type = "text" name = "pret_masina"><br>
     <button type = "submit" name = "submit1">SUBMIT</button>
     </form>
     <div class="form"  action = "formular.php">
     <h2 Style:"align = center";>Records(Masina)</h2>
		<table width="100%" border="2" style="border-collapse:collapse" align = "left";>
     <thead>
    <tr>
      <th><strong>ID(MASINA)</strong></th>
	   <th><strong>ID(PROD)</strong></th>
    </tr>
    </thead>
    <tbody>
<?php
    $serverName = "ASUS\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"Proiect");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
	
    $sel_query="Select id_masina, id_producator from Masina ORDER BY id_masina desc;";
    $result1 = sqlsrv_query($conn,$sel_query);
    while($row = sqlsrv_fetch_array($result1)) { ?>
         <td align="center"><?php echo $row["id_masina"]; ?></td>
		  <td align="center"><?php echo $row["id_producator"]; ?></td>
         </tr>
<?php
    }
?>
     </tbody>
     </table>
     </div>


    <form action="insert.php" method= "POST">
     <h2 style ="font-size:130%;">CLIENTI</h2>
     <label>ID(CLIENT):</label><input type = "text" name = "id_client"><br>
     <label>NUME:</label><input type = "text" name = "nume_client"><br>
     <label>PRENUME:</label><input type = "text" name = "prenume_client"><br>
     <label>CNP:</label><input type = "text" name = "CNP_client"><br>
     <label>ADRESA:</label><input type = "text" name = "adresa_client"><br>
     <button type = "submit" name = "submit2">SUBMIT</button>
    </form>
    <div class="form"  action = "formular.php">
      <h2 Style:"align = center";>Records(Clienti)</h2>
	  <table width="100%" border="2" style="border-collapse:collapse" align = "left";>
      <thead>
      <tr>
        <th><strong>ID(CLIENTI)</strong></th>
     </tr>
    </thead>
    <tbody>
<?php

     $sel_query="Select id_client from Clienti ORDER BY id_client desc;";
     $result1 = sqlsrv_query($conn,$sel_query);
     while($row = sqlsrv_fetch_array($result1)) { ?>
         <td align="center"><?php echo $row["id_client"]; ?></td>
         </tr>
<?php
     }
?>
     </tbody>
     </table>
     </div>
</body>
</html>
