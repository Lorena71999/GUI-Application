<?php
   $serverName = "ASUS\SQLEXPRESS";
   $connectionInfo = array( "Database"=>"Proiect");
   $conn = sqlsrv_connect( $serverName, $connectionInfo);
   $result1 = sqlsrv_query($conn,"select * from Clienti
                                  inner join Factura on Clienti.id_client = Factura.id_client 
								  where Factura.data_factura = (Select Max(data_factura) from Factura)");
    if($result1 === false) {
       die( print_r( sqlsrv_errors(), true) );
    }
   ?> 
   <html>
   <head>
   <title>Statistici</title>
   </head>
   <style>
  table, th, td {
     border: 2px solid black;
     background-color:#392544 ;
  
    }
body{
	 background-image: url('back.jpg');
     background-repeat: no-repeat;
	 font-family: 'Raleway', sans-serif;
	 background-attachment: fixed;
     background-size: cover;
    }
   </style>
   <body>
   <h1 style = "font-size:135%; font-family:Roboto;">Info despre clientii aflati pe ultimele facturi realizate:</h1>
   <table>
   <tr>
     <th>ID</th>
     <th>NUME CLIENT</th>
	 <th>PRENUME CLIENT</th>
	 <th>CNP CLIENT</th>
	 <th>DATA ULTIMEI FACTURI</th>
	 <th>ID(FACTURA)</th>
	 <th>PRET TOTAL</th>
	 <th>NUMAR MASINI</th>
   </tr>
   
   <?php while($row=sqlsrv_fetch_array($result1,SQLSRV_FETCH_ASSOC)) {
	?>
	<tr>
     <td><?php echo $row['id_client'];?></td>
     <td><?php echo $row['nume_client'];?></td>
     <td><?php echo $row['prenume_client'];?></td>
     <td><?php echo $row['CNP_client'];?></td>
     <td><?php echo $row['data_factura']->format('d/m/Y');?></td>
     <td><?php echo $row['id_factura'];?></td>
	 <td><?php echo $row['pret_total'];?></td>
	 <td><?php echo $row['nr_masini'];?></td>
   </tr>
	<?php
    }
   ?>
   </table>
   </body>
   </html>
   
   <html>
   <style>
     body {
	margin: 0;
	  background: #D6AAAD;
	  font-family:Roboto;
	  font-weight: 100;
	  font-size:20px;
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
     margin-left:auto;
     margin-right:auto;
   }

/* Style the submit button */
form.example button {
     float: left;
     width: 20%;
     padding: 10px;
     background:#957679;
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
   
   <h2 style ="font-size:120%;font-family:Roboto;">Introduceti numele clientului:</h2>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <form class="example" action="news.php" style="margin:2px;max-width:300px", method = "GET">
   <input type="text" placeholder="Cauta.." name="nume_client">
   <button type="submit" name = "modifica"><i class="fa fa-search"></i></button>
   </form>

   
 <?php
   $serverName = "ASUS\SQLEXPRESS";
   $connectionInfo = array( "Database"=>"Proiect");
   $conn = sqlsrv_connect( $serverName, $connectionInfo);
   
 if(isset($_GET['modifica'])){
	
	    
		$nume_client=$_GET['nume_client'];
		$record1 = sqlsrv_query($conn,"SELECT * 
		                              FROM Factura  
									  inner join Clienti  on Factura.id_client = Clienti.id_client 
									  WHERE CONCAT(Clienti.nume_client,' ',Clienti.prenume_client)='$nume_client'");
		$verif =sqlsrv_query($conn, "select * from Clienti where CONCAT(nume_client,' ',prenume_client) ='$nume_client'");
	    $ro = sqlsrv_fetch_array($verif);
	      if(!$ro){
   
	        header("Location:wrong.php");
	     }
?>
       <table>
        <tr>
		  <th>NUME CLIENT</th>
		  <th>PRENUME CLIENT</th>
          <th>PRET TOTAL</th>
          <th>NUMAR MASINI ACHIZITIONATE</th>
        </tr>
 <?php
        while($row=sqlsrv_fetch_array($record1)) {
	
	 ?>
	    <tr>
	       <td><?php echo $row['nume_client'];?></td>
	       <td><?php echo $row['prenume_client'];?></td>
	       <td><?php echo $row['pret_total'];?></td>
		   <td><?php echo $row['nr_masini'];?></td>
	    </tr>
	 
	<?php
 }

}
 
 ?>
 </table>
  <?php
   $record2 = sqlsrv_query($conn,"SELECT * FROM Clienti inner join Factura on Clienti.id_client = Factura.id_client");
?>
   <table align = "left">
    <tr>
      <th>ID(FACTURA)</th>
      <th>NUME CLIENT</th>
      <th>PRENUME CLIENT</th>
      <th>PRET TOTAL</th>
      <th>NUMAR DE MASINI</th>
    </tr>
	<?php
     while($row=sqlsrv_fetch_array($record2)) {
	 ?>
	<tr>
	  <td><?php echo $row['id_factura'];?></td>
	  <td><?php echo $row['nume_client'];?></td>
	  <td><?php echo $row['prenume_client'];?></td>
	  <td><?php echo $row['pret_total'];?></td>
      <td><?php echo $row['nr_masini'];?></td>
	</tr>
	<?php
    }
	
 ?>
     </table>
     </body>
     </html>
  
 

   