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
error_reporting(0);
include("../../din/config_db.php");
// apaga ou edita registos
$type 	= $_GET['tp'];
$table  = $_GET['tb'];	
$recno 	= $_GET['rc'];
$blck   = $_GET['fn'];
 
 if ($type=='d'){
 
   $sql = "DELETE FROM $table WHERE id='$recno'";

   if (mysqli_query($con, $sql)) {
   	 $resp= "OK";
	} else {
   	 $resp= "ERR";
	}

 $a=array('resp'=>$resp,'bk'=>$blck);
 print json_encode($a);

 } elseif($type=='e'){
 	 
 	$sql="SELECT * FROM $table WHERE id='$recno'";
 	
 	$result=mysqli_query($con,$sql);
   
   	if (mysqli_query($con, $sql)) {
	   	 $resp= "OK";
		} else {
	   	 $resp=  "ERR";
	}

   $a=array('resp'=>$resp,'bk'=>$blck,'tb'=>$table);

    $rows = array();
	$rows[]=$a;

		while($r = mysqli_fetch_assoc($result)) {
	    $rows[] = $r;
		}
		 print json_encode($rows);
 }

 mysqli_close($con);
?>