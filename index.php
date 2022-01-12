<?php

require_once('db.php'); 
$conn = getDbConnection(); 

if( isset($_SERVER['PHP_AUTH_USER'])) {
    if(checkUser(getDbConnection(), $_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])){
        echo "Kirjauduit sisään!";
    exit;
    }
}

header('WWW-Authenticate: Basic');
echo "Peruuntui";
exit;


function checkUser(PDO $dbcon, $username, $passwd){

    
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $passwd = filter_var($passwd, FILTER_SANITIZE_STRING);

    try{
        $sql = "SELECT password FROM user WHERE username=?";
        $prepare = $dbcon->prepare($sql);
        $prepare->execute(array($username));


        $rows = $prepare->fetchAll();

        foreach($rows as $row){
            $pw = $row["password"];
            if ( password_verify($passwd, $pw) ){
                return true;
            }
        }

        return false;

    }catch(PDOException $e){

    echo '<br>'.$e->getMessage();
}





}

function createUser(PDO $dbcon, $first_name, $last_name, $username, $password){


    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $passwd = filter_var($password, FILTER_SANITIZE_STRING);

   

    try{
        $hash_pw = password_hash($passwd, PASSWORD_DEFAULT);
        $sql = "INSERT IGNORE INTO user VALUES (?,?,?,?)";
        $prepare = $dbcon->prepare($sql);
        $prepare->execute(array($first_name, $last_name, $username, $hash_pw));

    }catch(PDOException $e){

    echo '<br>'.$e->getMessage();
}
}






?>
