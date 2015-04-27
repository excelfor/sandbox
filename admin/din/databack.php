<?php
session_start();
ob_start();
header('Content-type: text/html; charset=utf-8');
ini_set("display_errors",1);
error_reporting(E_ALL); 
include("../../din/config_db.php");
// cria registos do backoffice
$now = date("Y-m-d H:i:s");
$fase   = $_GET['v'];	

	 if ($fase==1){
        // Estabelecimentos e locais
	 	$name= $_POST["des"];
	 	$loc = $_POST['loc'];
	 	if (empty($name)){
	 		 ob_flush();
			 header("Location: ../set_establ?f=1&r");
			 exit;
	 	}
	 	 $sql="INSERT into entities (name, local,created) VALUES ('$name','$loc','$now')";

 	      if (!mysqli_query($con,$sql))
			{
			 die('Erro: ' . mysqli_error($con));
			} else{
				  mysqli_close($con);
				  ob_flush();
				  header("Location: ../set_establ?f=1");
			}

	 } elseif ($fase==2){
	 	// Departamentos e equipas
	 	$depart= $_POST["depart"];
	 	$entity= $_POST["entity"];
	 	$entity=(empty($entity))?$entity_id:$entity;
	 	if (empty($depart)){
	 		 ob_flush();
			 header("Location: ../set_establ?f=2&r");
			 exit;
	 	} 

	 	 $sql="INSERT into departments (entity_id,name,created) VALUES ('$entity','$depart','$now')";

 	      if (!mysqli_query($con,$sql))
			{
			 die('Erro: ' . mysqli_error($con));
			} else{
				  mysqli_close($con);
				  ob_flush();
				  header("Location: ../set_establ?f=2");
			}

	 } elseif ($fase==3){
	 	 // níveis
	 	$level = $_POST["level_id"];
	 	$name  = $_POST["level_n"];
	 	if (empty($level)|| empty($name)){
	 		 ob_flush();
			 header("Location: ../set_levels?f=1&r");
			 exit;
	 	} 
	 	 $sql="INSERT into user_types (name,user_level,created) VALUES ('$name','$level','$now')";

	 	 if (!mysqli_query($con,$sql))
			{
			 die('Erro: ' . mysqli_error($con));
			} else{
				  mysqli_close($con);
				  ob_flush();
				  header("Location: ../set_levels?f=1");
			}
	 }  elseif ($fase==4){
	 	  //  utilizadores
	 	$login 	= $_POST["loginid"];
	 	$name  	= $_POST["user_n"];
	 	$pass 	= $_POST["passwd"];
	 	$email 	= $_POST["email"];
	 	$telef 	= $_POST["telef"];
	 	$estab 	= $_POST["establ"];
	 	$team 	= $_POST["team"];
	 	$level 	= $_POST['userlev'];
	 	$func 	= $_POST['funcao'];
	 
	 	/* se trás um rec_id então trata-se de um update */
	 	$rec_id = $_POST["rec_id"];

	 	$status = strtoupper($_POST["status"]);
	 	// força erro se password ou login tiverem espaços em branco
	 	$status =($status=='S')?1:0;
	 	$pass 	=(strpos($pass,' '))?'':$pass;
	 	$login 	=(strpos($login,' '))?'':$login;
	 	if (empty($name)|| empty($pass) || empty($email) || empty($level) || empty($login)){
	 		ob_flush();
			header("Location: ../set_users?f=1&r");
			 exit;	 
	 	} 
          if(empty($rec_id)){
	 		 $sql="INSERT into users (name,email,telef,entity_id,department_id,user_type,funcao,loginid,pass,status,created) 
	 	 	VALUES ('$name','$email','$telef','$estab','$team','$level','$func','$login','$pass','$status','$now')";
	 	 	$volta=1;
	 	 	}else {
	 	 	 $sql = "UPDATE users SET name='$name', email='$email', telef='$telef',entity_id='$estab',department_id='$team',
	 	 	 user_type='$level',funcao='$func', loginid='$login',pass='$pass',status='$status',modified='$now'
	 	 	  WHERE id='$rec_id'";
	 	 	  // regressa para as listagens
	 	 	 $volta=3;
	 	 	}

	 	 if (!mysqli_query($con,$sql))
			{
			 die('Erro: ' . mysqli_error($con));
			} else{
				  mysqli_close($con);
				  ob_flush();
				  header("Location: ../set_users?f=$volta");
			}

	 }
 
?>