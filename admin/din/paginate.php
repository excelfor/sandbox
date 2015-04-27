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
$fase   = $_GET['f'];	
$lines 	= $_GET['ln'];
$orderfield="name";
switch ($fase) {
    case 'establ':
        $table='entities';
        break;
    case 'team':
    	$table='departments';
    	break;
    case 'levels':
    	$table='user_types';
    	$orderfield='user_level';
    	break;
    case 'users':
    	$table='users';
   }

 if ($fase !='team' && $fase !='users'){
 	  $sql="SELECT * FROM $table ORDER BY $orderfield ASC";
 } elseif ($fase=='team') {
	  $sql="SELECT $table.*, entities.name AS boss
	  FROM $table
	  LEFT JOIN entities
	  ON $table.entity_id = entities.id
	  ORDER BY $table.$orderfield ASC";
 } elseif ($fase=='users'){
 	 $sql="SELECT $table.*, departments.name AS departn, user_types.user_level AS nivel
	  FROM $table
	  LEFT JOIN departments
	  ON $table.department_id = departments.id
      LEFT JOIN user_types
      ON $table.user_type = user_types.id
	  ORDER BY departments.id ASC";
 }

 $result=mysqli_query($con,$sql);
 $rowcount=mysqli_num_rows($result);
 $pages = ceil($rowcount/$lines);
 $pg=array('lines'=>$rowcount,'pages'=>$pages);

 $rows = array();
 $rows[]=$pg;
	while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
	}

if($rowcount==0){
	$rows[]='niltch';
}
 print json_encode($rows);
 mysqli_close($con);

?>