<?php

$serverName = "ASUS\SQLEXPRESS";

 $connectionInfo = array( "Database"=>"Proiect");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

 if(isset($_POST['submit1'])){
 
 if(!empty($_POST['id_masina']) && !empty($_POST['marca']) && !empty($_POST['model']) && !empty($_POST['caracteristici']) && !empty($_POST['id_producator']) && !empty($_POST['pret_masina'])){
     $id_masina = $_POST['id_masina'];
     $marca = $_POST['marca'];
     $model= $_POST['model'];
     $caracteristici = $_POST['caracteristici'];
     $id_producator = $_POST['id_producator'];
     $pret_masina = $_POST['pret_masina'];
     $query2 = "SET IDENTITY_INSERT Masina ON ";
     $stmt2 = sqlsrv_query( $conn, $query2);

     if( $stmt2=== false ){
        die( print_r( sqlsrv_errors(), true));
       }

     $query = "insert into Masina(id_masina , marca , model , caracterisici , id_producator, pret_masina) values('$id_masina' , '$marca', '$model', '$caracteristici','$id_producator','$pret_masina')";
     $run = sqlsrv_query($conn, $query);
	 $query1 = sqlsrv_query( $conn,"select id_masina From Masina");
	 $rw = sqlsrv_fetch_array($query1);
	 if($rw['id_masina'] == $id_masina)
	 header("Location:wrong.php");
	 else{
	 $ss1 = sqlsrv_query( $conn,"select * From Masina order by id_masina DESC");
	  if( $run){
		  ?>
	<table>
         <tr>
          <th>ID(MASINA)</th>
          <th>MARCA</th>
          <th>MODEL</th>
          <th>CARACTERISTICI</th>
          <th>ID(PRODUCATOR)</th>
          <th>PRET MASINA</th>
        </tr>
	<?php
        while($row=sqlsrv_fetch_array($ss1)) {
	 
	 ?>
	   <tr>
	     <td><?php echo $row['id_masina'];?></td>
	     <td><?php echo $row['marca'];?></td>
	     <td><?php echo $row['model'];?></td>
		 <td><?php echo $row['caracterisici'];?></td>
		 <td><?php echo $row['id_producator'];?></td>
		 <td><?php echo $row['pret_masina'];?></td>
	   </tr>
	<?php
        }
 ?>
        </table>
		<?php
		   
	  }
 
  
  else{
   echo "All fields required!";
   header("Location:wrong.php");
   }
 }
 }
 }
 
 
 
 if(isset($_POST['submit2'])){
   if(!empty($_POST['id_client']) && !empty($_POST['nume_client']) && !empty($_POST['prenume_client']) && !empty($_POST['CNP_client']) && !empty($_POST['adresa_client'])){
      $id_client = $_POST['id_client'];
      $nume_client = $_POST['nume_client'];
      $prenume_client= $_POST['prenume_client'];
      $CNP_client = $_POST['CNP_client'];
      $adresa_client = $_POST['adresa_client'];
      $query3 = "SET IDENTITY_INSERT Clienti ON ";
      $stmt3 = sqlsrv_query( $conn, $query3);

      if( $stmt3=== false ){
         die( print_r( sqlsrv_errors(), true));
        }
     $query4 = "insert into Clienti(id_client ,nume_client ,prenume_client ,CNP_client ,adresa_client) values('$id_client' , '$nume_client', '$prenume_client', '$CNP_client','$adresa_client')";
     $run1 = sqlsrv_query($conn, $query4);
	 $ss2 = sqlsrv_query($conn,"select * from Clienti order by id_client DESC");
	 $query2 = sqlsrv_query( $conn,"select id_client From Clienti");
	 $rw1 = sqlsrv_fetch_array($query2);
	 if($rw1['id_client'] == $id_client)
	 header("Location:wrong.php");
	 else{
     if($run1){
		 	  ?>
	<table>
         <tr>
          <th>ID(CLIENT)</th>
          <th>NUME CLIENT</th>
          <th>PRENUME CLIENT</th>
          <th>CNP CLIENT</th>
          <th>ADRESA</th>
          
        </tr>
	<?php
        while($row=sqlsrv_fetch_array($ss2)) {
	 
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
		<?php
         
       }
    //else
    //{
     //echo "form submitted unsuccesfully";
    // die( print_r( sqlsrv_errors(), true));
   // }
	//header("Location:insert.php");
   
  else{
    echo "All fields required!";
	header("Location:wrong.php");
  }
      
  }
   }
 }
 

sqlsrv_close($conn);

?>

<html>
<style>
body {
     font-size: 50px;
     background-color:#b3b8cd;
     color:green;
     display:inline-block;
     width: 100%;
	 height:100%;
	 margin:auto;
	 text-align: center;
}
table, th, td {
     border: 2px solid black;
     background-color:#392544 ;
 
  
}
</style>
<body>

<span style='font-size:200px;'>&#10004;</span>
<span style='font-size:200px;'>&#128522;</span>


</body>
</html>

