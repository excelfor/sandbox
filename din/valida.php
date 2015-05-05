<?php
session_start();
ob_start();
header('Content-type: text/html; charset=utf-8');
ini_set("display_errors",1);
error_reporting(E_ALL); 
include("config_db.php");

$loginid =($_POST['login_dt']);
$loginid = str_replace(' ', '', $loginid);
$senha =  ($_POST['passwd']);
$loginid = stripslashes ($loginid);
$loginid = mysqli_real_escape_string($con,$loginid);

$senha = stripslashes ($senha);
$senha = mysqli_real_escape_string($con,$senha);

//$org = $_POST['org'];
$org = isset($_POST['org'])?$_POST['org']:'';


	if (empty($senha)|| empty($loginid)){
			 ob_flush();
			header("Location: ../index?err=1");
			exit;
		}
		
		$sql = "SELECT users.name, users.id, departments.id AS dep_id, departments.name AS dep_name, entities.name as ent_name, user_types.user_level AS type_id
		 FROM users, departments, entities, user_types 
		 WHERE users.loginid ='$loginid' AND users.pass ='$senha' AND users.status=1 
		 AND departments.id=users.department_id 
		 AND  entities.id = users.entity_id 
		 AND  user_types.id=users.user_type
		 LIMIT 0,1";
		$result = mysqli_query($con,$sql);
		$count = mysqli_num_rows($result);
		
			if (!mysqli_query($con,$sql))
			{
			 die('Erro: ' . mysql_error());
			  mysqli_close($con);
			  ob_flush();
			  header("Location: ../index?err");
			  exit;
			}
			if ($count == 1)
				{
					while($row = $result->fetch_assoc()) {
					$dep_id = $row['dep_id'];
					$id 	= $row['id'].','.$dep_id;
					$nome 	= $row['name'];
					$depart = ($row['dep_name']=='')?'-':$row['dep_name'];
			 		$entnm 	= $row['ent_name'];
				    $userl  = $row['type_id']; 
					}
				 // vai ver o nome e função above
					if ($userl>1 && $userl<99){
						 $userup=$userl-1; /* reaponta para o nível acima */
						 $sql="SELECT users.name AS super_n, user_types.name AS superfunc
						 FROM users,user_types
						 WHERE users.department_id='$dep_id'
						 AND user_types.user_level='$userup' LIMIT 0,1";
						 $result = mysqli_query($con,$sql) or die('Erro: ' . mysqli_error($con));
						 $count = mysqli_num_rows($result);
						 	 if ($count==1){
						 	 	while($row = $result->fetch_assoc()) {
						 	 		$supernm	= $row['super_n'];
						 	 		$superf 	= $row['superfunc'];
						 	 	} 
						 	 } 
					}
					$supernm 	=(empty($supernm))?'--':$supernm;
					$superf 	=(empty($superf))?'Top Level':$superf;
					$_SESSION['nome']= $nome;
					$_SESSION['superv'] = $supernm.'&nbsp;('.$superf.')';
					$_SESSION['descdep'] = $entnm.'&nbsp;-&nbsp;Área:&nbsp;'.$depart;
					//echo $_SESSION['id_data']=$id; // id da tabela users e departamento
					$_SESSION['id_data']=$id; // id da tabela users e departamento
					$_SESSION['id_lev'] = $userl; // level para controlo de acessos
					mysqli_close($con);
						if ($org !='adm'){
							 ob_flush();
							header("Location: ../assess");
						} else{
							 ob_flush();
						 	header("Location: ../admin/menuger");
						}
					ob_flush();
					exit;
				}
			else
			{
			 mysqli_close($con);
			 header("Location: ../index?err");
			 ob_flush();
			 exit;
			}
 
?>