	<html>
<style>
body {
  font-size: 100px;
   background-color:#b3b8cd;
   color:green;
   display:inline-block;
    width: 90%;
	height:10%;
	margin:auto;
	text-align: center;
}
table, th, td {

   border: 2px solid black;
  background-color:#392544 ;
  margin-left:auto;
  margin-right:auto;
  
  
}
</style>
<body>
<?php
 $serverName = "ASUS\SQLEXPRESS";

  $connectionInfo = array( "Database"=>"Proiect");

   $conn = sqlsrv_connect( $serverName, $connectionInfo);
   
  
  ?>
<span style='font-size:150px;'>&#10004;</span>
<span style='font-size:150px;'>&#128522;</span>
  <table align = "center">
        <tr>
		    <th>ID(FACTURA)</th>
          <th>DATA FACTURA</th>
          <th>NR MASINI</th>
          <th>PRET TOTAL</th>
          <th>ID(DEALER)</th>
		  <th>ID(CLIENT)</th>
          
		  
        </tr>
 <?php
 $record2 = sqlsrv_query($conn,"Select * FROM Factura order by data_factura desc");
        while($row=sqlsrv_fetch_array($record2)) {
	
	 ?>
	    <tr>
		 <td><?php echo $row['id_factura'];?></td>
	     <td><?php echo $row['data_factura']->format('d/m/Y');?></td>
	     <td><?php echo $row['nr_masini'];?></td>
		 <td><?php echo $row['pret_total'];?></td>
		 <td><?php echo $row['id_dealer'];?></td>
		 <td><?php echo $row['id_client'];?></td>
	      
		  
	    </tr>
	 
	<?php
 }


 
 ?>
 </table> 


</body>
</html>
   