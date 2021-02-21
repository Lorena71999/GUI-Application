  <!DOCTYPE html>
   <html lang="en">
   <head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css">
   </head>
   <style>
   body{
     background-image: url('back.jpg');
     background-repeat: no-repeat;
	 font-family: 'Raleway', sans-serif;
	 background-attachment: fixed;
     background-size: cover;
    }
  .main-section{
	 width:80%;
	 margin:0 auto;
	 text-align: center;
	 padding: 0px 5px;
    }
   .dashbord{
	 width:32%;
	 display: inline-block;
	 background-color:#34495E;
	 color:#fff;
	 margin-top: 50px; 
    }
   .icon-section i{
	 font-size: 30px;
	 padding:10px;
	 border:1px solid #fff;
	 border-radius:50%;
	 margin-top:-25px;
	 margin-bottom: 10px;
	 background-color:#34495E;
    }
   .icon-section p{
	 margin:0px;
	 font-size: 20px;
	 padding-bottom: 10px;
    }
   .detail-section{
	 background-color: #2F4254;
	 padding: 5px 0px;
    }
   .dashbord .detail-section:hover{
	 background-color: #5a5a5a;
	 cursor: pointer;
    }
   .detail-section a{
	 color:#fff;
	 text-decoration: none;
    }
   .dashbord-green .icon-section,.dashbord-green .icon-section i{
	 background-color: #16A085;
    }
   .dashbord-green .detail-section{
	 background-color: #149077;
    }
   .dashbord-orange .icon-section,.dashbord-orange .icon-section i{
	 background-color: #F39C12;
    }
   .dashbord-orange .detail-section{
	 background-color: #DA8C10;
    }
   .dashbord-blue .icon-section,.dashbord-blue .icon-section i{
	 background-color: #2980B9;
    } 
   .dashbord-blue .detail-section{
	 background-color:#2573A6;
    }
   .dashbord-red .icon-section,.dashbord-red .icon-section i{
	 background-color:#E74C3C;
    }
   .dashbord-red .detail-section{
	 background-color:#CF4436;
    }
   .dashbord-skyblue .icon-section,.dashbord-skyblue .icon-section i{
	 background-color:#8E44AD;
    }
   .dashbord-skyblue .detail-section{
	 background-color:#803D9B;
    }
   form {
     position: relative;
     z-index: 5;
	 background: rgba(255,255,255,0.1);
     max-width: 600px;
	 height:350px;
     margin:  0 auto 45px ;
     padding: 50px;
	 box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.16);
	 border-radius: 50px;
	
    }

 

 </style>
  <body>
    <form >
	  <div class="main-section">
		<div class="dashbord">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>~EVIDENTA MASINI SCUMPE~</small>
			</div>
			<div class="detail-section">
				<a href="allproducts.php">INFO</a>
			</div>
		</div>
		<div class="dashbord dashbord-green">
			<div class="icon-section">
				<i class="fa fa-money" aria-hidden="true"></i><br>
				<small>~CLIENTI MULTUMITI SI FERICITI~</small>
			
			</div>
			<div class="detail-section">
				<a href="news.php">INFO </a>
			</div>
		</div>
		<div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="fa fa-bell" aria-hidden="true"></i><br>
				<small>~DEALERI PRICEPUTI SI ORGANIZATI~</small>
				
			</div>
			<div class="detail-section">
				<a href="dealers.php">INFO </a>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-tasks" aria-hidden="true"></i><br>
				<small>~CALITATE LA SUPERLATIV~</small>
				
			</div>
			<div class="detail-section">
				<a href="producator.php">INFO </a>
			</div>
		</div>
		<div class="dashbord dashbord-red">
			<div class="icon-section">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
				<small>~STATISTICA VS PRESUPUNERE~</small>
			
			</div>
			<div class="detail-section">
				<a href="Interogari_complexe.php">INFO</a>
			</div>
		</div>
		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fa fa-comments" aria-hidden="true"></i><br>
				<small>~ADMIN SITUATIE(INFO++)~</small>
				
			</div>
			<div class="detail-section">
				<a href="admin.php">INFO</a>
			</div>
		</div>
	</div>
	</form>
</body>
</html>