<!DOCTYPE HTML>
<html lang='pt'>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex, nofollow">
<title>Excel Services</title>
<meta name="description" content="Exercício para mostar funcionalidades">
<script type="text/javascript" src="js/funback.js"></script>
<link rel="stylesheet" type="text/css" href="css/back.css" />
<script>
	window.onload = function () {
		document.getElementById("loginform").reset();
};

</script>
<style>
		#block_2{
			height:40px;
			display:block;
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
			<style scoped>
				h2{
				  position: absolute;
				  top:-80px;
				  left:100px;
				}

			</style>
				<h2>Acesso ao backoffice</h2>
		 		<div id="block_2">
		 			<form id="loginform" method="post" action="../din/valida">
		 			<input name="org" type='hidden' value='adm'>
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
		<section>


		</section>
	</div>
	
	<footer>
	 <!-- TODO -->
	</footer>
</body>

</html>