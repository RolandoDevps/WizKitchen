<?php

    $dsn = "mysql:host=localhost;dbname=task_list";
    $user = "root";
    $password = "";

    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try{
        $pdo = new PDO($dsn, $user, $password);
    } catch(PDOExceptiopn $e){
        echo 'Connexion échouée : '. $e->getMessage();
    }

    // var_dump($pdo);
?>