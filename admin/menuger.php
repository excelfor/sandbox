<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user 	= $_SESSION['nome'];
$id_reg	= $_SESSION['id_data'];
$cp_nm	= $_SESSION['descdep'];
$above	= $_SESSION['superv'];
$res=(isset($_GET['rs']))?true:false;
?>
<!DOCTYPE HTML>
<html lang='pt'>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex, nofollow">
<title>Excel Avaliação</title>
<meta name="description" content="Exercício para mostar funcionalidades">
<script type="text/javascript" src="js/funback.js"></script>
<link rel="stylesheet" type="text/css" href="css/back.css" />
<style>
#block_2{
	height:40px;
	display:block;
}
#wrapper{
	width:460px; 
	height:auto; 
	margin-top:100px;
	border:none;
	border-radius: 8px 8px 8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
}
</style>
</head>
<body>
	<header>
		 <div id='infolog'>
		  		<?php echo 'Logado como:&nbsp;'.$user; ?>
		  </div>
		<div id="sup"></div>
		<script>
			loadblock('admin_h','sup');
		</script>
	</header>
	<div id="wrapper" role="main">
			<div id="aviso" onclick="esconde(this);"><span id="mess"></span></div>
				<div id="block_2">
						<ul>
							<li onclick="opt(1)">Estabelecimentos e departamentos / equipas</li>
							<li onclick="opt(2)">Estrutura da organização</li>
							<li onclick="opt(3)">Gestão de utilizadores</li>
							<li onclick="opt(4)">Planeamento de atividades</li>
							<li onclick="opt(5)">Questionários</li>
							<li onclick="opt(6)">Chaves de Avaliação</li>
							<li onclick="opt(7)">Relatórios</li>
							<li id="reset" onclick="opt(8)">Reset de todas as Tabelas</li>
							<li onclick="opt(9)">Terminar a sessão</li>
						</ul>
		 		</div>
	</div>
	<footer>
	 <!-- TODO -->
	</footer>
<?php if ($res==true): ?>
	<script>
		var elem=document.getElementById('reset');
		elem.style.backgroundColor='red';
		elem.innerHTML='As tabelas foram reinicializadas';
	</script>
<?php endif; ?>
</body>

</html>