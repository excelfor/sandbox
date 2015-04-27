<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=utf-8');
header('Content-type: application/json'); 
header("Cache-Control: no-cache");
header("Pragma: no-cache");

error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(0);
include("config_db.php");

$now = date("Y-m-d H:i:s");
$project_id=1;
$user_id=8;

if (isset($_GET["fase"])){
	$fase  = trim($_GET["fase"]);
}
if (isset($_POST["fase"])){
	$fase  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fase"]))));
}
 
  if ($fase==1){
			 $r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			 $r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			 $r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			 $r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			 $r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			 $r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			 $r3=(empty($r3))?'0':$r3;
			 $r4=(empty($r4))?'0':$r4;
			 if (empty($r1) || empty($r2) || empty($r5) || empty($r6)){
				echo "ERR";
				break;
			 }
			 $sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',1,'$user_id','$r1','$now')";
			 mysqli_query($con,$sql);
			 $sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',2,'$user_id','$r2','$now')";
			 mysqli_query($con,$sql);
			 $sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',3,'$user_id','$r3','$now')";
			 mysqli_query($con,$sql);
			 $sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',4,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql);
			 $sql="INSERT into answers (project_id, query_id,user_id,ans_strg,created) VALUES ('$project_id',5,'$user_id','$r5','$now')";
			 mysqli_query($con,$sql);
			 $sql="INSERT into answers (project_id, query_id,user_id,sort_order,created) VALUES ('$project_id',6,'$user_id','$r6','$now')";
			 mysqli_query($con,$sql);
			 echo "OK";
		
	  } elseif ($fase==2) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r4  =(empty($r4))?'0':$r4;
		 
			if (empty($r1) || empty($r2) || empty($r3)){
			echo "ERR";
			break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',7,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',8,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',9,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',10,'$user_id','$r3','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  }

  $mysqli->close();
?>