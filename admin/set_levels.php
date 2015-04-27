<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user 	= $_SESSION['nome'];
$id_reg	= $_SESSION['id_data'];
$cp_nm	= $_SESSION['descdep'];
$above	= $_SESSION['superv'];
$errn=(isset($_GET['r']))?1:0;
$forf=(isset($_GET['f']))?$_GET['f']:0;
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
		<style scoped>
		   #wrapper{
		 	border:none;
		   	margin-top:150px; 
		   }
		   #block_2{
		   	width:400px;
		   	display: block;
		   	margin-left:auto;
		   	margin-right:auto;
		   }
		   .titsup{
		   	text-align:center;
		   	margin-bottom:30px;
		   }
		   .blinput{
		   	width:500px;
		   }
		   label{
		   	background-color: rgba(0,0,0,0.2);
		   	padding-left:3px;
		   }
		   input[type='text']{
		   		width:356px !important;
		   		display: inline-block;
		   }
		    input[type='number']{
		   		width:50px !important;
		   		display: inline-block;
		   		padding-right:4px;
		   }
		   /* todos os blocos ficam inicialmente escondidos */
		   #estab,#depart,#listagens{
		   	display:none;
		   }
		</style>
		<div id="wrapper"  role="main">
			<div id="retr">
				<a href='set_levels'>voltar</a>
			</div>
			<div id="aviso"></div>
			<div id="fieldwarning"></div>
				<!-- menu geral -->
				<div id="block_2">
					<ul style="width:400px !important">
						<li onclick="showblock(1)">Definir níveis e dependências</li>
						<li onclick="showblock(3)">Listagens</li>
						<li onclick="showblock(4)">Voltar ao Menu Geral</li>
					</ul>
		 		</div>
		 		<section>
		 			<!--Níveis -->
		 			<div id="estab">
		 				<h2 class="titsup">Definição de níveis</h2>

			 				<form id="niveis" method="post" action="din/databack?v=3">
			 				<div class="blinput">
				 				<label for "pass">Nível</label>
				 				<input type="number" name="level_id"   min="1" step="1" maxlength="2" autocomplete="off"  value=''>
				 			</div>
				 			<div class="blinput">
				 				<label for "logd">Designação</label>
				 				<input type="text" name="level_n"  id='leveln' autocomplete="off"   onkeyup="checkfordup(this,'levels')" value=''>
				 			</div>
				 			
				 			<input type="submit" class="button sub form" style="margin-left:160px" value="gravar">
			 			</form>
			 		</div>
			 			
		 		</section>
		 		
		 		<section>
		 		<!-- Listagens -->
		 			<div id="listagens">
		 				<h2 class="titsup">Listagem de Níveis</h2>
		 				<div id="listcontainer">
						</div>
						<script>
						 paginator2('levels','60',30);
						</script>
		 			</div>
		 		</section>
		</div>
	<footer>
	 <!-- TODO -->
	</footer>
	<script>
       function showblock(val){
       		var wrap=document.getElementById('wrapper');
       		document.getElementById('block_2').style.display='none';
       		document.getElementById('retr').style.display='block';
       		wrap.style.border='1px solid rgba(0,0,0,0.4)';
       		wrap.style.marginTop='60px';
   			switch(val) {
			    case 1:
			       document.getElementById('estab').style.display='block';
			        break;
			    case 3:
			       	document.getElementById('listagens').style.display='block';
			        break;
		        case 4:
		        	/* volta ao menu  q for indicado fora da pag. ativa */
		        	document.getElementById('wrapper').style.display='none';
			        window.location.href='menuger';
			        break;
			} 
       }
       <?php
       /* executa alterações às views em função da resposta da BD
       e produz as respetivas notificações
       se  $forf==0 significa que vem do menu anteriror e não da BD */
       	if ($forf!=0){ ?>
       		var dival=document.getElementById('aviso');
       			/* verifica se a BD retornou um erro */
	       		<?php if($errn!=1){?>
	       			dival.innerHTML='Base de dados atualizada';
	       		 <?php } else {?>
	       		 	dival.innerHTML='Impossível gravar';
	       		 <?php } ?>
       		 dival.style.visibility='visible';
       		 /* executa função que chama os diferentes blocos dadas as respostas */
      		 showblock(<?php echo $forf;?>);
      		 setTimeout(function(){ dival.style.display = "none";},3000);
       <?php } ?>
	</script>	 			 
</body>
</html>