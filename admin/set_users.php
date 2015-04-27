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
include("../din/config_db.php");
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
		   	margin-top:30px;
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
		   input[type='email']{
		   		width:356px !important;
		   		display: inline-block;
		   		
		   }
		   /* todos os blocos ficam inicialmente escondidos */
		   #estab,#depart,#listagens{
		   	display:none;
		   }
		   .seldown{
		   	background-color: #005424;
		   }
		   img#userform{
		   	position: absolute;
		   	width:30px;
		   	height:auto;
		   	cursor:pointer;
		   	right:190px;
		   	top:84px;
		   	border:none;
		   }
		   #status{
		   	width:34px !important;
		   	height:22px;
		   	line-height:22px;
		   	text-align:center;
		   	border:1px solid grey;
		   	margin-left:52px;
		   }
		</style>
		<div id="wrapper"  role="main">
			<div id="retr">
				<a href='set_users'>voltar</a>
			</div>
			<div id="aviso"></div>
			<div id="fieldwarning"></div>
				<!-- menu geral -->
				<div id="block_2">
					<ul style="width:400px !important">
						<li onclick="showblock(1)">Criação e edição de utilizadores</li>
						<li onclick="showblock(3)">Listagens</li>
						<li onclick="showblock(4)">Voltar ao Menu Geral</li>
					</ul>
		 		</div>
		 		<section>
		 			<!--User data -->
		 			<div id="estab">
		 				<h2 class="titsup">Dados do utilizador</h2>

			 				<form id="niveis" method="post" action="din/databack?v=4">
				 			<div class="blinput">
				 				<label for "usern">Nome</label>
				 				<input type="text" name="user_n"  id='usern' autocomplete="off"  value=''>
				 			</div>
				 			<img src='img/smail.png' id='userform' onclick='sendmail(this)' title='Envia credenciais'>
				 			<div class="blinput">
				 				<label for "loginid">Login ID</label>
				 				<input type="text" name="loginid"  id='loginid' placeholder='até 16 carateres sem espaços (case sensitive)' maxlength="16" autocomplete="off"  onblur="checkfordup(this,'loginid')" value=''>
				 			</div>
				 			<div class="blinput">
			 				<label for "pass">Senha de acesso</label>
			 				<input type="text" name="passwd" id="pass"  placeholder='até 10 carateres sem espaços (case sensitive)' autocomplete="off" maxlength="10" size="10" value=''>
			 			</div>
				 			<div class="blinput">
				 				<label for "mail">E-Mail</label>
				 				<input type="email" name="email"  id='mail' size='220' autocomplete="off"  value=''>
				 			</div>
				 			<div class="blinput">
				 				<label for "telef">Telefone</label>
				 				<input type="telef" name="telef"  id='telef'  maxlength="16" autocomplete="off"  value=''>
				 			</div>
				 			<div class="blinput type2">
				 				<label for "estab">Estabelecimento</label>
				 				<div class="selcont" style="top:-32px;left:180px">
									<div class="seldown">V</div>
									<select name="establ" id="establec" class="selectbx">
										<option value="0">Não definido...</option>
										<?php
										/* vai buscar os locais à BD */
										$sql = "SELECT id, name FROM entities ORDER by id ASC";
										$result = mysqli_query($con,$sql) or  die('Erro: ' . mysqli_error($con));
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row['id'].">".$row['name']."</option>";	
											}
										?>
									</select>
								</div>
				 			</div>
				 			<div class="blinput type2">
				 				<label for "team">Depart. / Equipa</label>
				 				<div class="selcont" style="top:-32px;left:180px">
									<div class="seldown">V</div>
									<select name="team" id="team" class="selectbx">
										<option value=0>Escolha o seu grupo</option>
										<?php
										/* vai buscar os departamentos / Equipas à BD */
										$sql = "SELECT id, name FROM departments ORDER by id ASC";
										$result = mysqli_query($con,$sql) or  die('Erro: ' . mysqli_error($con));
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										?>
									</select>
								</div>
				 			</div>
				 			<div class="blinput type2">
				 				<label for "userlev">Posição</label>
				 				<div class="selcont" style="top:-32px;left:180px">
									<div class="seldown">V</div>
									<select name="userlev" id="userlev" class="selectbx" 
									onchange="document.getElementById('funcao').value=this.options[this.selectedIndex].text">
										<option value="0">A sua função na equipa</option>
										<?php
										/* vai buscar os user types */
										$sql = "SELECT id, name FROM user_types ORDER by id ASC";
										$result = mysqli_query($con,$sql) or  die('Erro: ' . mysqli_error($con));
											while ($row = mysqli_fetch_array($result)){
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										?>
									</select>
									<input type="hidden" name="funcao" id="funcao" value="" />
								</div>
				 			</div>
				 			<div class="blinput type2">
				 				<label for "status">Ativo?</label>
				 				<input type="text" name="status"  id='status' maxlength="1" value='S'>
				 			</div>
				 			<input type='hidden' name='rec_id' id='rec_id' value=''>
				 			<input type="submit" class="button sub form" style="margin-left:160px" value="gravar">
			 			</form>
			 		</div>
			 			
		 		</section>
		 		
		 		<section>
		 		<!-- Listagens -->
		 			<div id="listagens">
		 				<h2 class="titsup">Listagem de Utilizadores</h2>
		 				<div id="listcontainer">
						</div>
						<script>
						 paginator2('users','25',40);
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