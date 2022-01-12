<?php
session_start();
require('db.php');
require('index.php');
require('config.sql');

// $db = getDbConnection();

//createUser(getDbConnection(),"Muumi", "Pappa", "muumipappa", "muumilaakso");
//createUser(getDbConnection(),"Harry", "Potter", "harrypotter", "tylypahka");
//createUser(getDbConnection(),"Nalle", "Puh", "nallepuh", "hunajapurkki");



if( isset($_SERVER['PHP_AUTH_USER'])){

if( checkUser(getDbConnection(), $_SERVER['PHP_AUTH_USER'], $_SERVER["PHP_AUTH_USER"]) ){
    $_SESSION["user"] = $_SERVER['PHP_AUTH_USER'];
    echo "Kirjauduit sisään";
}else{
    echo "Väärä salasana";

}
}


header('HTTP/1.1 401');
exit;


?>



