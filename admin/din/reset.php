<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);
//error_reporting(0);
include("../../din/config_db.php");
$now = date("Y-m-d H:i:s");

$sql = "SHOW TABLES FROM $DB_NAME";
$result=mysqli_query($con,$sql);
//echo    mysqli_num_rows($result);
if (!mysqli_query($con,$sql)){
			 die('Erro: ' . mysqli_error($con));
} else{
	
	while($r = mysqli_fetch_row($result)) {
		$sql="TRUNCATE TABLE ".$r[0];
	    mysqli_query($con,$sql) or die('Erro: ' . mysqli_error($con));
	}
 /* user type 99 => todos os privilégios || Aviso: pode criar inconsistências na BD */
 $sql="INSERT into users (name,email,telef,entity_id,department_id,user_type,loginid,pass,status,hidden,created,modified) 
	   VALUES ('Admn. Sistema','geral@excelformacao.pt',' ','1','1','99','admin','admin!123','1','1','$now','$now')";
 mysqli_query($con,$sql) or die('Erro: ' . mysqli_error($con));
 
 $sql="INSERT into departments (entity_id,name,hidden,created,modified) VALUES ('1','Gestão do Sistema','1','$now','$now')" ;
 mysqli_query($con,$sql) or die('Erro: ' . mysqli_error($con));

 $sql="INSERT into entities (name,local,hidden,created,modified) VALUES ('Excel Formação','Lisboa','1','$now','$now')";
 mysqli_query($con,$sql) or die('Erro: ' . mysqli_error($con));

 $sql="INSERT into user_types (name,user_level,hidden,created,modified) VALUES ('Manutenção do Sistema','99','1','$now','$now')";
 mysqli_query($con,$sql) or die('Erro: ' . mysqli_error($con));

mysqli_close($con);
}
ob_flush();
header("Location: ../menuger?rs");
exit;
?>