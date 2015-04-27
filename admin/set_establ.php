<?php
session_start();
ob_start();
error_reporting(E_ALL);
include("../din/config_db.php");
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
		   .type2{
		   	border-bottom:none;
		   	margin-top:26px;
		   }
		   label{
		   	background-color: rgba(0,0,0,0.2);
		   	padding-left:3px;
		   }
		   input[type='text']{
		   		width:356px !important;
		   		display: inline-block;
		   }
		   /* todos os blocos ficam inicialmente escondidos */
		   #estab,#depart,#listagens{
		   	display:none;
		   }
		   .selcont{
		   	position: relative;
		   	margin:30px auto 20px auto;
		   }
		   .seldown{
		   	background-color: #005424;
		   }
		</style>
		<div id="wrapper"  role="main">
			<div id="retr">
				<a href='set_establ'>voltar</a>
			</div>
			<div id="aviso"></div>
			<div id="fieldwarning"></div>
				<!-- menu geral -->
				<div id="block_2">
					<ul style="width:400px !important">
						<li onclick="showblock(1)">Estabelecimentos</li>
						<li onclick="showblock(2)">Departamentos / Equipas</li>
						<li onclick="showblock(3)">Listagens</li>
						<li onclick="showblock(4)">Voltar ao Menu Geral</li>
					</ul>
		 		</div>
		 		<section>
		 			<!--establecimentos -->
		 			<div id="estab">
		 				<h2 class="titsup">Estabelecimentos</h2>

			 				<form id="locais" method="post" action="din/databack?v=1">
			 			
				 			<div class="blinput">
				 				<label for "logd">Designação</label>
				 				<input type="text" name="des"  id='nomes' autocomplete="off"   onkeyup="checkfordup(this,'estab')" value=''>
				 			</div>
				 			<div class="blinput">
				 				<label for "pass">Localização</label>
				 				<input type="text" name="loc"   autocomplete="off"  value=''>
				 			</div>
				 			
				 			<input type="submit" class="button sub form" style="margin-left:160px" value="gravar">
			 			</form>
			 		</div>
			 			
		 		</section>
		 		<section>
		 			<!-- departamentos -->
		 			<div id="depart">
		 				<h2 class="titsup">Departamentos / Equipas</h2>
			 				<form id="dept" method="post" action="din/databack?v=2">
					 			<div class="blinput">
					 				<label for "depart">Designação</label>
					 				<input type="text" name="depart"  id="deptr" autocomplete="off"  onkeyup="checkfordup(this,'dep')" value=''>
					 			</div>
					 			<div class="blinput type2">
				 				<label for "userlev">Estabelecimento</label>
				 				<div class="selcont" style="top:-56px;left:60px">
									<div class="seldown">V</div>
									<select name="entity" id="entity" class="selectbx">
										<option value="0">Escolha um local...</option>
										<?php
										/* vai buscar os user types */
										$sql = "SELECT id, name FROM entities ORDER by name ASC";
										$result = mysqli_query($con,$sql) or  die('Erro: ' . mysqli_error($con));
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										?>
									</select>
								</div>
				 			</div>

					 			<input type="submit" class="button sub form" style="margin-left:160px" value="gravar">
				 			</form>
			 		</div>
		 		</section>
		 		<section>
		 		<!-- listagens ecrã -->
		 			<div id="listagens">
		 				<h2 class="titsup">Listagens</h2>
		 				<div class="selcont">
								<div class="seldown">V</div>
								<select name="selista" id="selista" class="selectbx" onchange="paginator(this,30)">
									<option value="0">Escolha a listagem...</option>
									<option value="1">Estabelecimentos</option>
									<option value="2">Equipas</option>
								</select>
						</div>
						<div id="listcontainer">
						</div>
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
			    case 2:
			       	document.getElementById('depart').style.display='block';
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