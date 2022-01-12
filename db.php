<?php

// Luo ja palauttaa tietokantayhteyden

function getDbConnection(){

    try {
        $dbcon = new PDO('mysql:host=localhost;dbname=n0vasu00', 'root', '');
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOExpection $e){
        echo $e->getMessage();

    }

    return $dbcon;
}