 <html>
    <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
     <style>
    body {
	     margin: 0;
	     background: #D6AAAD;
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
    table, th, td {
         border: 2px solid black;
         background-color:#392544 ;
  
    }


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
         background:#957679;
         color: white;
         font-size: 17px;
         border: 3px solid grey;
         border-left: none; /* Prevent double borders */
         cursor: pointer;
    }

    form.example button:hover {
         background: #0b7dda;
    }

/* Clear floats */
    form.example::after {
         content: "";
         clear: both;
         display: table;
    }
/* Style The Dropdown Button */
   .dropbtn {
         background-color:#957679;
         color: white;
         padding: 16px;
         font-size: 90px;
         border: none;
         cursor: pointer;
    }

/* The container <div> - needed to position the dropdown content */
   .dropdown {
         position: relative;
         display: inline-block;
    }

/* Dropdown Content (Hidden by Default) */
   .dropdown-content {
         display: none;
         position: absolute;
         background-color: #957679;
         min-width: 660px;
         box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
         z-index: 1;
    }

/* Links inside the dropdown */
    .dropdown-content a {
         color: black;
         padding: 20px 56px;
         text-decoration: none;
         display:inline-block;
         font-size: 90px;
    }

/* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color:#957679}

/* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
         display: block;
   }

/* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
          background-color:#957679 ;
}
    .container {
         max-width: 350px;
         margin: 50px auto;
         text-align: center;
	     float:left;
    }

    input[type="submit"] {
         margin-bottom: 80px;
	     background-color:#957679;
	     border-radius: 23px;
	     color:white;
	     width: 150px;
         height: 40px;
	     font-size:20px;
	     margin-left:auto;
         margin-right:auto;
	  
    }

    .select-block {
         width: 300px;
         margin: 110px auto 30px;
         position: relative;
	     font-size: 20px;
    }

    select {
         width: 100%;
         height: 50px;
         font-size: 100%;
         font-weight: bold;
         cursor: pointer;
         border-radius: 0;
         background-color: #957679;
         border: none;
         border: 2px solid #957679;
         border-radius: 4px;
         color: white;
         appearance: none;
         padding: 8px 38px 10px 18px;
        -webkit-appearance: none;
        -moz-appearance: none;
        transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
    }

    /* For IE <= 11 */
         select::-ms-expand {
         display: none;
    }

    .selectIcon {
         top: 7px;
         right: 15px;
         width: 30px;
         height: 36px;
         padding-left: 5px;
         pointer-events: none;
         position: absolute;
         transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .selectIcon svg.icon {
         transition: fill 0.3s ease;
         fill: white;
    }

    select:hover,
         select:focus {
         color: #000000;
         background-color: white;
	     font-size: 20px;
    }

    select:hover~.selectIcon,
         select:focus~.selectIcon {
         background-color: white;
    }

    select:hover~.selectIcon svg.icon,
         select:focus~.selectIcon svg.icon {
          fill: #957679;
    }
     </style>
	 
   <body>
   
    <h1 style = " font-size:200%;font-family:Roboto;">Introuduceti pretul dorit:</h1>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form class="example" action="producator.php" style="margin:2px;max-width:300px", method = "GET">
    <input type="text" placeholder="Cauta.." name="pret_masina">
    <button class="submit" name = "modifica2"><i class="fa fa-search"></i></button>
    </form>

   
 <?php
 
    $serverName = "ASUS\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"Proiect");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);//conexiunea cu baza de date
   
 if(isset($_GET['modifica2'])){//daca butonul de search este apasat memoram valoarea din input intr-o variabila pentru a o folosi in interogare
		$pret_masina=$_GET['pret_masina'];
		$record4 = sqlsrv_query($conn,"SELECT * 
		                              FROM Masina 
									  inner join Producator on Producator.id_producator = Masina.id_producator
									  where Masina.pret_masina = $pret_masina");
		$verif =sqlsrv_query($conn, "SELECT * from Masina WHERE pret_masina = $pret_masina");//interogarea de verificare
	    $ro = sqlsrv_fetch_array($verif);
	    if($ro){
?>
        <table align = "right">
            <tr>
               <th>ID(MASINA)</th>
               <th>NUME PRODUCATOR</th>
			    <th>MARCA</th>
               <th>MODEL</th>
			    <th>PRET</th>
               <th>CARACTERISTICI</th>
			   <th>ID(PRODUCATOR)</th>
            </tr>
 
<?php

         while($row=sqlsrv_fetch_array($record4)) {
?>
	        <tr>
	          <td><?php echo $row['id_masina'];?></td>
	          <td><?php echo $row['nume_producator'];?></td>
			  <td><?php echo $row['marca'];?></td>
	          <td><?php echo $row['model'];?></td>
			   <td><?php echo $row['pret_masina'];?></td>
	          <td><?php echo $row['caracterisici'];?></td>
			  <td><?php echo $row['id_producator'];?></td>
	        </tr>
	
<?php
  }

  }
 
  else
  
  {//daca nu exista valoarea intodusa in baza de date se va afisa 0!!
?>
	
         <table align = "right">
          <tr>
            <th>ID(MASINA)</th>
            <th>NUME PRODUCATOR</th>
            <th>MODEL</th>
            <th>CARACTERISTICI</th>
            <th>PRET</th>
          </tr>
          <tr>
	       <td><?php echo '0';?></td>
	       <td><?php echo '0';?></td>
	       <td><?php echo '0'?></td>
	       <td><?php echo '0';?></td>
	       <td><?php echo '0';?></td>
          </tr>
 
 <?php
 
        }
        }
 
 ?>
 </table>
 <?php
$record2 = sqlsrv_query($conn,"SELECT * FROM Masina inner join Producator on  Masina.id_producator = Producator.id_producator");
?>
<table align = "right">
<tr>
<th>ID(MASINA)</th>
<th>NUME PRODUCATOR</th>
<th>MARCA</th>
<th>MODEL</th>
<th>PRET</th>
<th>CARACTERISTICI</th>
<th>ID(PRODUCATOR)</th>

</tr>
	<?php
 while($row=sqlsrv_fetch_array($record2)) {
	 
	 ?>
	 <tr>
	 <td><?php echo $row['id_masina'];?></td>
	 <td><?php echo $row['nume_producator'];?></td>
	 <td><?php echo $row['marca'];?></td>
	 <td><?php echo $row['model'];?></td>
	 <td><?php echo $row['pret_masina'];?></td>
     <td><?php echo $row['caracterisici'];?></td>
	 <td><?php echo $row['id_producator'];?></td> 
	</tr>
	<?php
 }
 ?>
 </table>
 
 
    <div class="container mt-5">
    <form action="producator.php" method="post" class="mb-3">
    <div class="select-block">
	
          <select name="cars">
          <option value="" disabled selected>Alege Marca</option>
          <option value="Ford">Ford</option>
		  <option value="Audi">Audi</option>
         
          </select>
          <div class="selectIcon">
          <svg focusable="false" viewBox="0 0 104 128" width="35" height="35" class="icon">
            <path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z"></path>
          </svg>
          </div>
    </div>
          <input type="submit" name="submit" vlaue="Choose options">
    </form>


 <?php
   $serverName = "ASUS\SQLEXPRESS";//conexiunea
   $connectionInfo = array( "Database"=>"Proiect");
   $conn = sqlsrv_connect( $serverName, $connectionInfo);
   
  if(isset($_POST['submit'])){
    if(!empty($_POST['cars'])) {
        $selected = $_POST['cars'];//salvez valoarea data ca input 
		switch($selected){
			 case "Ford":
         	 $record5 = sqlsrv_query($conn,"SELECT id_masina , model, nume_producator,pret_masina,caracterisici
                          			 FROM Masina inner join Producator on Masina.id_producator= Producator.id_producator 
									 where  Masina.marca like 'Ford%'");
	   
 ?>
	         <table>
	         <tr>
		      <th>ID(MASINA)</th>
		      <th>MODEL</th>
		      <th>NUME(PRODUCATOR)</th>
		      <th>PRET(MASINA)</th>
		      <th>CARACTERISTICI</th>
	         </tr>
<?php
            while($row=sqlsrv_fetch_array($record5)) {
?>
	         <tr>
		      <td><?php echo $row['id_masina'];?></td>
		      <td><?php echo $row['model'];?></td>
		      <td><?php echo $row['nume_producator'];?></td>
		      <td><?php echo $row['pret_masina'];?></td>
	          <td><?php echo $row['caracterisici'];?></td>
	         </tr>
	
	<?php
            }
             break;//sfarsit cazul Ford
			
 ?>
             </table>
 <?php
             case "Audi":
	               $record6 = sqlsrv_query($conn,"SELECT id_masina ,model ,nume_producator ,pret_masina,caracterisici 
             				                      FROM Masina
												  inner join Producator on Masina.id_producator= Producator.id_producator
												  where  Masina.marca like 'Audi%'");
?>
             <table>
              <tr>
                <th>ID(MASINA)</th>
		        <th>MODEL</th>
		        <th>NUME(PRODUCATOR)</th>
		        <th>PRET(MASINA)</th>
			    <th>CARACTERISTICI</th>
		
		      </tr>
<?php
              while($row=sqlsrv_fetch_array($record6)) {//afisez datele in tabel
	
	 ?>
	 	     <tr>
		      <td><?php echo $row['id_masina'];?></td>
		      <td><?php echo $row['model'];?></td>
		      <td><?php echo $row['nume_producator'];?></td>
		      <td><?php echo $row['pret_masina'];?></td>
		      <td><?php echo $row['caracterisici'];?></td>
	        </tr>
	
	<?php
            }

             break;

            }
			}
			}
 ?>
             </table>


	
     </body>
</html>