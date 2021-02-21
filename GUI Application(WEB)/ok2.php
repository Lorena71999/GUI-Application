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
		  <th>ID(CLIENT)</th>
		  <th>NUME CLIENT</th>
          <th>PRENUME CLIENT</th>
          <th>CNP CLIENT</th>
		  <th>ADRESA CLIENT</th>
        </tr>
 <?php
    $record2 = sqlsrv_query($conn,"Select * FROM Clienti");
        while($row=sqlsrv_fetch_array($record2)) {
	 ?>
	    <tr>
	       <td><?php echo $row['id_client'];?></td>
	       <td><?php echo $row['nume_client'];?></td>
	       <td><?php echo $row['prenume_client'];?></td>
		   <td><?php echo $row['CNP_client'];?></td>
		   <td><?php echo $row['adresa_client'];?></td>
	    </tr>
	<?php
        }
 ?>
 </table> 
</body>
</html>
