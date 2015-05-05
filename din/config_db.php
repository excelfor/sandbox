<?php
/* servidorvitrine */
/**
* 
* @var /
* 
*/

/* local */
$DB_HOST="localhost";
$DB_USERNAME="root";
$DB_PASSWORD="";
$DB_NAME="excelforDev";
$entity_id=1; // a mudar dinamicamente

$con = mysqli_connect("$DB_HOST", "$DB_USERNAME", "$DB_PASSWORD") or die("Falta de permissões para aceder à base de dados ou host indisponível. Impossível prosseguir...");
mysqli_select_db($con,"$DB_NAME") or die("Base de dados não encontrada. Erro fatal.");
mysqli_set_charset($con,'utf8');

/*
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

*/
if (get_magic_quotes_gpc()) {

   function stripSlashesRecursive($array) {
       $stripped = array();
       foreach($array as $key => $member) {
          if (is_array($member)) {
             $stripped[stripslashes($key)] = stripSlashesRecursive($member);
          } else {
              $stripped[stripslashes($key)] = stripslashes($member);
          }
       }

       return $stripped;
    }

    $globals = array('_GET', '_POST', '_COOKIE', '_REQUEST');

    foreach($globals as $global) {
       $$global = stripSlashesRecursive($$global);
    }



}


?>