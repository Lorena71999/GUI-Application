<DOCTYPE!>
<?php

   $serverName = "ASUS\SQLEXPRESS";
   $connectionInfo = array( "Database"=>"Proiect");
   $conn = sqlsrv_connect( $serverName, $connectionInfo);

				

    if(isset($_GET['modifica1'])){
	
	  if( !empty($_GET['marca'])){
		$marca=$_GET['marca'];
		$pret_masina = $_GET['pret_masina'];
		$record1 = sqlsrv_query($conn,"SELECT * FROM Masina WHERE marca='$marca'");
		$ver1 = sqlsrv_fetch_array($record1);
		if (isset($ver1)) {
		   $sql="UPDATE Masina SET pret_masina= $pret_masina  WHERE marca='$marca'";
		   $r1 = sqlsrv_query($conn, $sql);
		   $ss2 = sqlsrv_query($conn,"select * from Masina order by id_masina desc");
		   header("Location:ok3.php");
		
	    }
	    else
	       header("Location:wrong.php");
       }
       else
          header("Location:wrong.php");


    }


 				
    if(isset($_GET['modifica2'])){
	
	  if( !empty($_GET['data_factura'])){
		$data_factura=$_GET['data_factura'];
		$nr_masini = $_GET['nr_masini'];
		$record = sqlsrv_query($conn,"SELECT * FROM Factura WHERE data_factura='$data_factura'");
		$ver = sqlsrv_fetch_array($record);
		if (isset($ver)) {
		   $sql1="UPDATE Factura SET nr_masini= $nr_masini  WHERE data_factura='$data_factura'";
		   $r2 = sqlsrv_query($conn, $sql1);
		   header("Location:ok4.php");
	    }
	    else
	       header("Location:wrong.php");
      }
      else
          header("Location:wrong.php");


   }
 
?>
<html>	
  <head>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
  form {
 
     position:0 px;
     z-index: 0;
     width: 300px;
     margin: 10px 10px;
	 background-color: #b3b8cd;
     max-width: 300px;
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
     align-items: left;
     justify-content: center;
     min-height: 100vh;
     margin: 0;
     padding: 0;
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
     width: 1300px;
     clear: both;
	 height:30px;
	  margin:-10px -10px;
 
}

</style>
   <body>
   <div class = "container">
		<form method="GET" >
			MARCA: <input type="text" name="marca">
			NOUL PRET: <input type="text" name="pret_masina">
			<button class="button" name="modifica1">MODIFICA</button>
		</form><br/></br>
	</div>
			
			<div class="form">
         
         <table width="40%" border="1" style="border-collapse:collapse" align = "center";>
         <thead>
         <tr>
          <th><strong>MARCA</strong></th>
          <th><strong>PRET</strong></th>
         </tr>
         </thead>
         <tbody>
<?php

        $sel_query="Select * from Masina ORDER BY id_masina desc;";
        $result = sqlsrv_query($conn,$sel_query);
        while($row = sqlsrv_fetch_array($result)) { ?>
         <td align="center"><?php echo $row["marca"]; ?></td>
         <td align="center"><?php echo $row["pret_masina"]; ?></td>
        </tr>
<?php
        }
?>
       </tbody>
       </table>
       </div>
	    <div class = "container">
      	<form method="GET">
		DATA FACTURA: <input type="text" name="data_factura">
		NR DE MASINI: <input type="text" name="nr_masini">
		<button class="button" name="modifica2">MODIFICA</button>
		</form><br/></br>
		</div>
		
		<div class="form">
		<table width="40%" border="1" style="border-collapse:collapse" align = "center";>
        <thead>
        <tr>
        <th><strong>DATA</strong></th>
        <th><strong>NUMAR DE MASINI</strong></th>
        </tr>
        </thead>
        <tbody>
<?php

        $sel_query="Select * from FACTURA ORDER BY id_factura desc";
        $result1 = sqlsrv_query($conn,$sel_query);
        while($row = sqlsrv_fetch_array($result1)) { ?>

         <td align="center"><?php echo $row["data_factura"]->format('d/m/Y'); ?></td>
         <td align="center"><?php echo $row["nr_masini"]; ?></td>
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
		

    
	
	



