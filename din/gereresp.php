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
			 
			 if ( empty($r1) || empty($r2) || empty($r5) || empty($r6) ){
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

  } elseif ($fase==3) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',11,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',12,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',13,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',14,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',15,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',16,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',17,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',18,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',19,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==4) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',20,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',21,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',22,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',23,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',24,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',25,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',26,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',27,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',28,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==5) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',29,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',30,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',31,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',32,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',33,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',34,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',35,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',36,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',37,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==6) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',38,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',39,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',40,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',41,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',42,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',43,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',44,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',45,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',46,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==7) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if (   empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',47,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',48,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',49,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',50,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',51,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',52,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',53,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',54,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',55,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==8) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',56,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',57,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',58,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',59,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',60,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',61,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',62,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',63,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',64,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==9) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',65,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',66,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',67,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',68,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',69,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',70,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',71,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',72,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',73,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==10) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if (   empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',74,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',75,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',76,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',77,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',78,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',79,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',80,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',81,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',82,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==11) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',83,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',84,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',85,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',86,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',87,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',88,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',89,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',90,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',91,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==12) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',92,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',93,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',94,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',95,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',96,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',97,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',98,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',99,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',100,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==13) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));
			$r3  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg3"]))));
			$r4  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg4"]))));
			$r5  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg5"]))));
			$r6  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg6"]))));
			$r7  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg7"]))));
			$r8  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg8"]))));
			$r9  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg9"]))));
			
		 
			if ( empty($r1) || empty($r2) || empty($r3) 
				|| empty($r4) || empty($r5) || empty($r6)
				|| empty($r7) || empty($r8) || empty($r9) )
			{
				echo "ERR";
				break;
			}
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',101,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',102,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',103,'$user_id','$r3','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',104,'$user_id','$r4','$now')";
			 mysqli_query($con,$sql) or die(mysql_error());			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',105,'$user_id','$r5','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',106,'$user_id','$r6','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',107,'$user_id','$r7','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',108,'$user_id','$r8','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',109,'$user_id','$r9','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			echo "OK";

  } elseif ($fase==14) {
			$r1  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg1"]))));
			$r2  = trim(addslashes(htmlspecialchars(rawurldecode($_POST["fg2"]))));			
		 
			if ( empty($r1) || empty($r2) )
			{
				echo "ERR";
				break;
			}
			
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',110,'$user_id','$r1','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			$sql="INSERT into answers (project_id, query_id,user_id,value,created) VALUES ('$project_id',111,'$user_id','$r2','$now')";
			mysqli_query($con,$sql) or die(mysql_error());
			
			echo "OK";

  }

  $mysqli->close();
?>