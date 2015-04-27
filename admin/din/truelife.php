<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=utf-8');
header('Content-type: application/json'); 
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header('Content-type: text/html; charset=utf-8');
ini_set("display_errors",1);
error_reporting(E_ALL); 
include("../../din/config_db.php");
// procura duplicados
$fase   = $_GET['f'];	
$expr 	= $_GET['v'];
$loginid=false;

if ($fase=='dep'){

	$sql = "SELECT name FROM departments 
	WHERE name LIKE '%$expr%' LIMIT 0,1";
	$answr = 'Esta equipa';
} elseif ($fase=='estab')  {
	$sql = "SELECT name FROM entities 
	WHERE name LIKE '%$expr%' LIMIT 0,1";
	$answr = 'Este estabelecimento';
} elseif ($fase=='levels') {
	$sql = "SELECT name FROM user_types 
	WHERE name LIKE '%$expr%' LIMIT 0,1";
	$answr = 'Nota: alguém com esta função';

} elseif ($fase=='loginid') {
	$sql = "SELECT loginid FROM users 
	WHERE loginid = '$expr' LIMIT 0,1";
	$answr="<span style='color:red'>".'Atenção:'."</span>"."&nbsp;Esse User ID";
	$loginid=true;
}

$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
mysqli_close($con);

$a=($count==1)?array('resp'=>$count,'field'=>$answr):array('resp'=>'niltch');
// avisa sempre
if ($count==0 && $loginid==true):
	$answr="<span style='color:#005424'>".'Nota: o login ID parece válido'."</span>";
	$a=array('resp'=>2,'field'=>$answr);
endif;
echo json_encode($a);
 
?>