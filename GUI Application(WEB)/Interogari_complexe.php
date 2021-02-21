<html>
<style>
body{
     background: #D6AAAD;
	 font-family: 'Raleway', sans-serif;
	 color:white;
}
table, th, td {
     border: 2px solid black;
     background-color:#392544 ;
 
  
}
    body {
	 margin: 0;
	 background-color: #D6AAAD;
	 font-family:Roboto;
	 font-weight: 100;
	 font-size:10px;
	 color:white;
	 background-image: url('back.jpg');
     background-repeat: no-repeat;
	 font-family: 'Raleway', sans-serif;
	 background-attachment: fixed;
     background-size: cover;

}
  * {
     box-sizing: border-box;
}

/* Style the search field */
     form.example input[type=text] {
     padding: 10px;
     font-size: 17px;
     border: 1px solid grey;
     float: left;
     width: 80%;
     background: #f1f1f1;
}

/* Style the submit button */
form.example button {
     float: left;
     width: 20%;
     padding: 10px;
     background:#392544 ;
     color: white;
     font-size: 17px;
     border: 3px solid grey;
     border-left: none; /* Prevent double borders */
     cursor: pointer;
    }

form.example button:hover {
     background: #D6AAAD;
    }

/* Clear floats */
     form.example::after {
     content: "";
     clear: both;
     display: table;
}
</style>
<body>
<?php
     $serverName = "ASUS\SQLEXPRESS";
     $connectionInfo = array( "Database"=>"Proiect");
     $conn = sqlsrv_connect( $serverName, $connectionInfo);
  ?>
       <h1 style = "font-size:200%;font-family:Roboto;">Producatorii care au media  masinilor produse mai mare decat media tuturor  masinilor produse:</h1>
 <?php $result11= sqlsrv_query($conn,"select p.nume_producator as Nume, avg(t.pret_masina) as medie_pret_masini 
                                     from Producator p , Masina t where t.id_producator = p.id_producator 
									 group by p.nume_producator
									 having avg(t.pret_masina)>(select avg(pret_masina) from Masina)");
 
  ?>
  <table>
  <tr>     
    <th>NUMELE PRODUCATORULUI</th> 
    <th>MEDIA PRETURILOR MASINILOR PRODUSE</th>         
  </tr> 
<?php
 while($row=sqlsrv_fetch_array($result11)) {
	 ?>
	 <tr>
	   <td><?php echo $row['Nume'];?></td> 
	   <td><?php echo $row['medie_pret_masini'];?></td>    
	</tr>
	 <?php
 }
  ?>
  </table>
  
 
     <h2 style = "font-size:200%;font-family:Roboto;">Clientii care au cumparat cel putin o masina din companie ordonati descrescator dupa nume la data introdusa de la tastatura:</h2>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <form  class = "example"  action="Interogari_complexe.php" , method = "GET" style="margin:2px;max-width:300px" >
     <input type="text" placeholder="Cauta.." name="data_factura">
     <button class="submit" name = "modifica4"><i class="fa fa-search"></i></button>
     </form>
<?php

if(isset($_GET['modifica4'])){
	     //interogare complexa 
		$data_factura=$_GET['data_factura'];
		$record7 = sqlsrv_query($conn,"select nume_client as NUME, prenume_client as PRENUME, adresa_client as ADRESA 
		                               FROM Clienti inner join Factura on clienti.id_client = Factura.id_client 
									   where Clienti.id_client IN(Select id_client  
									                              from Factura 
																  where data_factura = '$data_factura' and nr_masini != '0') 
									   Order by nume_client");
									   
	    $verif22 =sqlsrv_query($conn, "select * from Factura where data_factura = '$data_factura'");
	    $ro22 = sqlsrv_fetch_array($verif22);
	    if(!$ro22){
	    header("Location:wrong.php");
	   }
   ?>
   <table>
     <tr>
      <th>NUME</th>
      <th>PRENUME</th>
	  <th>ADRESA</th>
	</tr>
	  <?php
 while($row=sqlsrv_fetch_array($record7)) {
	 ?>
  <tr>
	<td><?php echo $row['NUME'];?></td>
	<td><?php echo $row['PRENUME'];?></td>
	<td><?php echo $row['ADRESA'];?></td>
  </tr>
	
	<?php
     }
     }
	?>
	</table>
	<?php 
     //interogare ce imi returneaza informatii din tabela Dealer dar si din Clienti prin inner join
     $record33 = sqlsrv_query($conn,"SELECT * FROM Clienti inner join Factura on Factura.id_client = Clienti.id_client");
?>    
        <table>
         <tr>
          <th>ID(CLIENT)</th>
          <th>NUME CLIENT</th>
          <th>PRENUME CLIENT</th>
          <th>CNP CLIENT</th>
          <th>ID(FACTURA)</th>
          <th>NUMAR MASINI CUMPARATE</th>
          <th>PRET TOTAL</th>
		  <th>DATA FACTURA</th>
        </tr>
	<?php
        while($row=sqlsrv_fetch_array($record33)) {
	 
	 ?>
	   <tr>
	     <td><?php echo $row['id_client'];?></td>
	     <td><?php echo $row['nume_client'];?></td>
	     <td><?php echo $row['prenume_client'];?></td>
		 <td><?php echo $row['CNP_client'];?></td>
		 <td><?php echo $row['id_factura'];?></td>
		 <td><?php echo $row['nr_masini'];?></td>
		 <td><?php echo $row['pret_total'];?></td>
		 <td><?php echo $row['data_factura']->format('d/m/Y');?></td>
	   </tr>
	<?php
        }
 ?>
        </table>
	<h3 style = "font-size:200%;font-family:Roboto;">Producatorii care nu au masini de vanzare dar totusi figureaza in companie:</h3>
	<?php
	$rec = sqlsrv_query($conn,"select a.nume_producator as NUME1, a.id_producator as ID 
	                          From Producator a where a.id_producator NOT IN(select distinct a2.id_producator 
							                                                 From Producator  a2 ,Masina t 
																			 where a2.id_producator = t.id_producator)"); 
	?>
	<table>
	<tr>
	   <th>NUME PRODUCATOR</th>
	   <th>ID(PRODUCATOR)</th>
	   
	   
	   </tr>
	   <?php
	while($row=sqlsrv_fetch_array($rec)) {
	?>
	
	  <tr>
	     <td><?php echo $row['NUME1'];?></td>
		 <td><?php echo $row['ID'];?></td>
		 
	  </tr>
	
<?php
	}
?>
</table>

<?php
    $record23 = sqlsrv_query($conn,"SELECT *
                                 	FROM Producator p left join Masina t on t.id_producator = p.id_producator");
?>
   <table>
   <tr>
    <th>ID(PRODUCATOR)</th>
    <th>ID(MASINA)</th>
    <th>MARCA</th>
    <th>MODEL</th>
    <th>NUME PRODUCATOR</th>
   </tr>
	<?php
    while($row=sqlsrv_fetch_array($record23)) {
	 ?>
	 <tr>
	     <td><?php echo $row['id_producator'];?></td>
		 <td><?php echo $row['id_masina'];?></td>
		 <td><?php echo $row['marca'];?></td>
		 <td><?php echo $row['model'];?></td>
		 <td><?php echo $row['nume_producator'];?></td>
	</tr>
	<?php
    }
 ?>
 
   </table>
   </body>
   </html>
   