<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user 	= $_SESSION['nome'];
$id_reg	= $_SESSION['id_data'];
$cp_nm	= $_SESSION['descdep'];
$above	= $_SESSION['superv'];
?>
<!DOCTYPE HTML>
<html lang='pt'>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex, nofollow">
<title>Excel Avaliação</title>
<meta name="description" content="Exercício para mostar funcionalidades">
<script type="text/javascript" src="js/funger.js"></script>
<link rel="stylesheet" type="text/css" href="css/geral.css" />
<script>
window.onload = function () {
    var tenMinutes = 60 * 10,
    display = document.querySelector('#right_h');
    startTimer(tenMinutes, display);
    document.getElementById("Fgroup3").value = "";
    document.getElementById("Fgroup4").value = "";
    document.getElementById("form0").reset();
};
</script>
</head>
<body>
	<header>
		<div id="sup"></div>
		<script>
			loadblock('header','sup');
		</script>
		<div id="infouser">
			<div id="conpuser"><span>Utilizador:</span><span style='color:#005424'><b><?php echo '&nbsp;'.$user; ?></b></span>
			<span>Team Leader:&nbsp;<?php echo $above; ?></span>
			</div>
			<div id="compdata"><?php echo $cp_nm; ?></div>
		</div>
	</header>
	<div id="wrapper" role="main">
			<div id="aviso" onclick="esconde(this);"><span id="mess"></span></div>
			<!-- bloco de perguntas 1 -->
			<div id="qr001"></div>
			<script>
			loadblock('bloco001','qr001');
		 	</script>
		 	<!-- bloco de perguntas 2 -->
		 	<div id="qr002"></div>
		 	<!-- bloco de perguntas 3 -->
		 	<div id="qr003"></div>
		 	<!-- bloco de perguntas 4 -->
		 	<div id="qr004"></div>
			<!-- bloco de perguntas 5 -->
		 	<div id="qr005"></div>
			<!-- bloco de perguntas 6 -->
		 	<div id="qr006"></div>
			<!-- bloco de perguntas 7 -->
		 	<div id="qr007"></div>
			<!-- bloco de perguntas 8 -->
		 	<div id="qr008"></div>
			<!-- bloco de perguntas 9 -->
		 	<div id="qr009"></div>
			<!-- bloco de perguntas 10 -->
		 	<div id="qr010"></div>
			<!-- bloco de perguntas 11 -->
		 	<div id="qr011"></div>
			<!-- bloco de perguntas 12-->
		 	<div id="qr012"></div>
			<!-- bloco de perguntas 13 -->
		 	<div id="qr013"></div>
			<!-- bloco de perguntas 14 -->
		 	<div id="qr014"></div>
	</div>
	
	<footer>
	 <!-- TODO -->
	</footer>
</body>

</html>