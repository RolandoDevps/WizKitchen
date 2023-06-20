<?php
    $dsn = "mysql:host=localhost;dbname=db_wizkitchen";
    $user = "root";
    $password = "";

    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try{
        $bdd = new PDO($dsn, $user, $password, $option);
    } catch(PDOExceptiopn $e){
        echo 'Connexion échouée : '. $e->getMessage();
        die();
    }
?>