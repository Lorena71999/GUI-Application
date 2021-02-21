  <html>
   <style>
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
         float: center;
         width: 20%;
         padding: 10px;
         background:#392544;
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
     table, th, td {
         border: 2px solid black;
         background-color:#392544 ;
         margin-left:auto;
         margin-right:auto;
         margin-top:5%;
    }

   </style>
   
   <body>
   
     <h1 style = " font-size:190%;">Introduceti numele clientului caruia i s-au vandut masinile(sau masina):</h1>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <form class="example" action="dealers.php" style="margin:2px;max-width:300px" , method = "GET">
     <input type="text" placeholder="Cauta.." name="nume_client">
     <button type="submit" name = "modifica1"><i class="fa fa-search"></i></button>
     </form>



   
 <?php
 
    $serverName = "ASUS\SQLEXPRESS";//conexiunea
    $connectionInfo = array( "Database"=>"Proiect");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
   
 if(isset($_GET['modifica1'])){
	
		$nume_client=$_GET['nume_client'];
		$record1 = sqlsrv_query($conn,"SELECT * 
		                               FROM Dealer
									   inner join Factura on Factura.id_dealer = Dealer.id_dealer 
									   WHERE Factura.id_factura = (Select id_factura 
									                               from Factura 
																   where id_client =(select id_client 
																                     from Clienti
 																					 where CONCAT(nume_client,' ',prenume_client) = '$nume_client'))");
		$verif =sqlsrv_query($conn, "select * from Clienti where CONCAT(nume_client,' ',prenume_client) = '$nume_client'");//verificare interogare
	    $ro = sqlsrv_fetch_array($verif);
	    if($ro){
	      
	    
?>
        <table>
         <tr>
          <th>ID(DEALER)</th>
          <th>NUME DEALER</th>
          <th>PRENUME DEALER</th>
          <th>ADRESA SEDIU</th>
          <th>DENUMIRE SEDIU</th>
		  <th>ID(CLIENT)</th>
         </tr>
<?php
         while($row=sqlsrv_fetch_array($record1)) {
	 
?>
	     <tr>
	      <td><?php echo $row['id_dealer'];?></td>
	      <td><?php echo $row['nume_dealer'];?></td>
	      <td><?php echo $row['prenume_dealer'];?></td>
		  <td><?php echo $row['adresa_sediu'];?></td>
		  <td><?php echo $row['denumire_sediu'];?></td>  
		  <td><?php echo $row['id_client'];?></td>  
	     </tr>
	<?php
        }
		}else
		 header("Location:wrong.php");

        }
 
 ?>
         </table>
<?php 
     //interogare ce imi returneaza informatii din tabela Dealer dar si din Clienti prin inner join
     $record2 = sqlsrv_query($conn,"SELECT * FROM Dealer inner join Factura on Factura.id_dealer = Dealer.id_dealer join Clienti on Factura.id_client = Clienti.id_client");
?>    
        <table align = "left">
         <tr>
          <th>ID(DEALER)</th>
          <th>NUME DEALER</th>
          <th>PRENUME DEALER</th>
          <th>ADRESA SEDIU</th>
          <th>DENUMIRE SEDIU</th>
          <th>ID(FACTURA)</th>
          <th>ID(CLIENT)</th>
          <th>NUME CLIENT</th>
		   <th>PRENUME CLIENT</th>
        </tr>
	<?php
        while($row=sqlsrv_fetch_array($record2)) {
	 
	 ?>
	   <tr>
	     <td><?php echo $row['id_dealer'];?></td>
	     <td><?php echo $row['nume_dealer'];?></td>
	     <td><?php echo $row['prenume_dealer'];?></td>
		 <td><?php echo $row['adresa_sediu'];?></td>
		 <td><?php echo $row['denumire_sediu'];?></td>
		 <td><?php echo $row['id_factura'];?></td>
		 <td><?php echo $row['id_client'];?></td>
		 <td><?php echo $row['nume_client'];?></td>
		  <td><?php echo $row['prenume_client'];?></td>
	   </tr>
	<?php
        }
 ?>
     </table>
     </body>
</html>
  