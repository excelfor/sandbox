<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=utf-8');
header('Content-type: application/json'); 
header("Cache-Control: no-cache");
header("Pragma: no-cache");

error_reporting(E_ALL);
ini_set('display_errors', 1);
//error_reporting(0);
include("config_db.php");


// encontrar todos os ficheiros
$query ="SELECT answers.value, answers.project_id, queries.name, COUNT(*) AS count
        FROM answers,queries
        WHERE answers.query_id=queries.id
        AND queries.id=1
        GROUP BY answers.value";

$result = mysqli_query($con,$query)  or die(mysql_error());
$rows = array();
    while($r = mysqli_fetch_assoc($result)) {
     $rows[] = $r;
    }
    
    print json_encode($rows); 
?>