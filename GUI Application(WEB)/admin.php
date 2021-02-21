 <html>
 <style>
   body {
	 margin: 0;
	 background: #D6AAAD;
	 font-family:Roboto;
	 font-weight: 100;
	 font-size:20px;
	 color:white;
	 max-width: 300px;
	 background-image: url('back.jpg');
     background-repeat: no-repeat;
	 font-family: 'Raleway', sans-serif;
	 background-attachment: fixed;
     background-size: cover;

}
table, th, td {

     border: 2px solid black;
     background-color:#392544 ;
	 margin:0 px;
	 width:600px;
	
  
}
form {
 
     position: relative;
     z-index: 5;
	 float:left;
   
	 background-color: #b3b8cd;
     max-width: 100px;
     margin:15px  15px;
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
 .container {
	 
     width: 100px;
     clear: both;
     height:70px;
     float:;
  }
  .chartContainer{
	 background-color:#392544
	 float:center;
	 margin-top:0; margin-bottom:0; margin-left:auto; margin-right:auto;
	 
  }
  canvas{
    margin-top:0; margin-bottom:0; margin-left:auto; margin-right:auto;
    }

</style>
 <body>
 <?php
   $serverName = "ASUS\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"Proiect");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    $rec = sqlsrv_query($conn,"select Sum(pret_total) as suma From Factura where id_dealer = 2");
    $rec1 = sqlsrv_query($conn,"select Sum(pret_total)as suma1 From Factura where id_dealer = 1");
    $rec2 = sqlsrv_query($conn,"select Sum(pret_total) as suma2 From Factura where id_dealer = 3");
    $rec3 = sqlsrv_query($conn,"select Sum(pret_total) as suma3 From Factura where id_dealer = 6");
    $rec4 = sqlsrv_query($conn,"select Sum(pret_total) as suma4 From Factura where id_dealer = 5");
    $ver = sqlsrv_fetch_array($rec);
    $ver1 = sqlsrv_fetch_array($rec1);
    $ver2 = sqlsrv_fetch_array($rec2);
    $ver3 = sqlsrv_fetch_array($rec3);
    $ver4= sqlsrv_fetch_array($rec4);
    $dataPoints = array( 
	   array("label"=>"Petre Iustin", "y"=>$ver['suma']),
	   array("label"=>"Mihai Alin", "y"=>$ver1['suma1']),
	   array("label"=>"Manoliu Andrei", "y"=> $ver2['suma2']),
	   array("label"=>"Iliescu Mihai", "y"=>$ver3['suma3']),
	   array("label"=>"Comanescu Ilie", "y"=>$ver4['suma4']),
	
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Profit"
		 //background-color:#392544 ;
	},
	data: [{
		type: "pyramid",
		indexLabel: "{label} - {y}",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>

     <div id="chartContainer" style="height: 470px; width: 650px;  align =right"></div>
     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     <div class -= "container">
     <div class="form">
     <table width="100%" border="1" style="border-collapse:collapse;align = right">
     <thead>
     <tr>
      <th><strong>NUME DEALER</strong></th>
      <th><strong>PRENUME DEALER</strong></th>
      <th><strong>PRET TOTAL MASINI VANDUTE</strong></th>
     </tr>

     </thead>
     <tbody>

<?php
   $sel_query="Select * from Dealer d inner join Factura f on d.id_dealer = f.id_dealer ORDER BY d.id_dealer DESC";
   $result = sqlsrv_query($conn,$sel_query);
   while($row = sqlsrv_fetch_array($result)) { ?>
     <td align="center"><?php echo $row['nume_dealer']; ?></td>
     <td align="center"><?php echo $row['prenume_dealer']; ?></td>
     <td align="center"><?php echo $row['pret_total']; ?></td>
     </tr>
<?php

    } 
?>
    </tbody>
    </table>
    </div>
	
	
</div>
</body>
</html>               
  
   