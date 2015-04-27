<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html lang='pt'>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex, nofollow">
<title>Excel Services</title>
<meta name="description" content="Exercício para mostar funcionalidades">
<script type="text/javascript" src="js/funger.js"></script>
<link rel="stylesheet" type="text/css" href="css/geral.css" />
<script>
	window.onload = function () {
		document.getElementById("loginform").reset();
};

</script>
<style>
		ul{
			list-style-type: none;
			padding:0;
			display: block;
		}
		li{
			background-color: #005424;
			color:white;
			height:25px;
			margin-bottom:2px;
			line-height:25px;
			padding:4px;
			cursor:pointer;
		}
		li:hover{
			background-color: grey;
			color:orange;
		}
		#block_2{
			display: none;
			height:40px;
			display:none;
		}
		.blinput{
			width:300px;
			height:30px;
			border-bottom:1px solid grey;
			display: block;
			margin:5px auto 6px auto;
		}
		input {
			display: inline-block;
			height:20px;
			width:140px;
			background:none;
			border:none;
			padding-bottom:3px;
			font-size: 1em;
			font-family: helvetica,arial,sans-serif;
		}
		label{
          height:20px;
          line-height: 20px;
          padding:2px;
          width:130px;
          display: inline-block;
		}
		#wrapper{
			width:400px; 
			height:160px !important; 
			margin-top:200px;
			border:none;
			border-radius: 8px 8px 8px;
			-moz-border-radius:8px;
			-webkit-border-radius:8px;
		}
		#contfirst{
			width:400px;
			height:300px;
			border: 1px solid rgba(0,0,0,0.2);
			border-radius: 7px 7px 7px 7px;
			-moz-border-radius:7px;
			-webkit-border-radius:7px;
			padding:20px;
			position: relative;
			top:-60px;
			-webkit-box-shadow: 10px 10px 49px 2px rgba(0,0,0,0.44);
			-moz-box-shadow: 10px 10px 49px 2px rgba(0,0,0,0.44);
			box-shadow: 10px 10px 49px 2px rgba(0,0,0,0.44);
		}

</style>
</head>
<body>
	<header>
		<div id="sup"></div>
		<script>
			loadblock('admin_h','sup');
		</script>
	</header>
	<div id="wrapper" role="main">
		<div id="erro">Não foi possível validar os seus dados</div>
			<?php if(isset($_GET['err'])){ ?>
			<script>
				var err=document.getElementById('erro');
				err.style.display='block';
				setTimeout(function(){ err.style.display = "none";},3000);

			</script>
			<?php } ?>
		<section>
			<div id="contfirst">
				<img id='logo' src='img/logoexcel.png' >
				<div id="block_1">
					<ul>
						<li onclick="opt(1)"><?php echo _("Área de backoffice");?></li>
						<li onclick="opt(2)">Avaliações</li>
					</ul>
				</div>
			</div>
		 		<div id="block_2">
		 			<form id="loginform" method="post" action="din/valida">
			 			<div class="blinput">
			 				<label for "logd">O seu login ID</label>
			 				<input tye="text" name="login_dt" id="logd"  autocomplete="off" maxlength="18" size="18" value=' '>
			 			</div>
			 			<div class="blinput">
			 				<label for "pass">A sua password</label>
			 				<input type="password" name="passwd" id="pass"  autocomplete="off" maxlength="10" size="10" value=''>
			 			</div>
			 			<input type="submit" class="button sub" style="margin-left:160px" value="avançar">
		 			</form>
		 		</div>
		 </section>
		<section>


		</section>
	</div>
	
	<footer>
	 <!-- TODO -->
	</footer>
	<script>
	function opt(val){
			if(val==2){
				var wrp=document.getElementById('wrapper');
				document.getElementById('contfirst').style.display='none';
				wrp.style.border='1px solid grey';
				wrp.style.backgroundColor='rgba(0,0,0,0.05)';
				wrp.style.boxShadow="7px 7px 9px 0px rgba(50, 50, 50, 0.3)";
				wrp.style.MozBoxShadow="7px 7px 9px 0px rgba(50, 50, 50, 0.3)";
				wrp.style.webkitBoxShadow="7px 7px 9px 0px rgba(50, 50, 50, 0.3)";
				document.getElementById('block_2').style.display='block';
			} else{
				window.location.href='admin/login';
			}

	}
	</script>
</body>

</html>