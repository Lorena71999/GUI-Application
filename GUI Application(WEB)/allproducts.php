 <?php
    $serverName = "ASUS\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"Proiect");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
   
?>
<!DOCTYPE html> 
<html lang="en"> 
 <head> 
   <meta charset="UTF-8"> 
 <style> 
	html,
    body {
	height: 200%;
}

body {
	margin: 0;
	 background: #D6AAAD;
	 font-family:Roboto;
	 font-weight: 100;
	 background-image: url('back.jpg');
     background-repeat: no-repeat;
	 font-family: 'Raleway', sans-serif;
	 background-attachment: fixed;
     background-size: cover;

}

.container {
	 position: left;
	 top: 50%;
	 left:50%;
	 transform: translate(-50%, -50%);
}

	 
table, th, td {
 
     border: 2px solid black;
     background-color:#392544 ;
     margin-left:auto;
     margin-right:auto;
     margin-top:5%;
     color:white;
  
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
</head> 
<body> 
    <section> 
	   <h2 style = "font-size:200%;color:white;align = center;font-family:Roboto;">Introduceti numele producatorului aici:</h2>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <form  action="allproducts.php" , method = "GET", class = "example" style="margin:2px;max-width:300px" >
          <input type="text" placeholder="Cauta.." name="nume_producator">
          <button class="submit" name = "modifica1"><i class="fa fa-search"></i></button>
        </form>
<?php
        if(isset($_GET['modifica1'])){
		    $nume_producator=$_GET['nume_producator'];//interogare complexa,afiseaza cea mai scumpa masina a producatorului introdus de la tastatura
		    $record1 = sqlsrv_query($conn,"select t.marca as MARCA , t.model as MODEL ,t.pret_masina as PRET
                               			From Masina t 
										join Producator p  on t.id_producator = p.id_producator
										where  p.nume_producator = '$nume_producator' 
										and t.pret_masina >=All(select ta.pret_masina from Masina ta
										join Producator p  on ta.id_producator = p.id_producator
										where p.nume_producator = '$nume_producator')Order by t.pret_masina DESC");
		    if( $record1=== false ){
               die( print_r( sqlsrv_errors(), true));
            }//verific aici daca am in baza de date un producator cu numele introdus de la tastatura
		    $verif =sqlsrv_query($conn, "select * from Producator 
			                             join Masina on Masina.id_producator = PRODUCATOR.id_producator 
										 where nume_producator = '$nume_producator'");
	        $ro = sqlsrv_fetch_array($verif);
	        if($ro){
?>
             <table  align = "center">
             <tr>
              <th>MARCA</th>
              <th>MODEL</th>
              <th>PRETUL</th>
             </tr>
<?php
             while($row=sqlsrv_fetch_array($record1)) {
 ?>        
	        <tr>
	         <td><?php echo $row['MARCA'];?></td>
	         <td><?php echo $row['MODEL'];?></td>
	         <td><?php echo $row['PRET'];?></td>
	        </tr>
	<?php
            }
          }
   else{
	 	?>
		
          <table align = "center">
           <tr>
             <th>MARCA</th>
             <th>MODEL</th>
             <th>PRETUL</th>
           </tr>
           <tr>
	         <td><?php echo '0';?></td>
	         <td><?php echo '0';?></td>
	         <td><?php echo '0'?></td>
           </tr>
		  <?php
        }
 
    }//afisez info despre Masina 
	 $result = sqlsrv_query($conn,"select * 
	                               from Masina 
	                               inner  join Producator on Masina.id_producator = Producator.id_producator");
	?>
	
	</table>
      <table  align = "center"> 
            <tr> 
                <th>ID(MASINA)</th> 
                <th>MARCA</th> 
                <th>MODEL</th> 
                <th>CARACTERISTICI</th> 
				<th>PRET</th>
				<th>PRODUCATOR</th>
				<th>ID(PRODUCATOR)</th> 
            </tr> 
            
    <?php   
      while($rows=sqlsrv_fetch_array($result)) 
        { 
    ?> 
        <tr>   
        <td><?php echo $rows['id_masina'];?></td> 
        <td><?php echo $rows['marca'];?></td> 
        <td><?php echo $rows['model'];?></td> 
        <td><?php echo $rows['caracterisici'];?></td> 
	    <td><?php echo $rows['pret_masina'];?></td> 
	    <td><?php echo $rows['nume_producator'];?></td>
         <td><?php echo $rows['id_producator'];?></td>		
       </tr> 
    <?php 
        } 
    ?> 
	
      </table> 
      </section> 
</body> 
</html> 