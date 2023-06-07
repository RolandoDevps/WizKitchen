<?php
    $label = $_POST["label"];
    $description = $_POST["description"];

    $message =  'failed';

    if(!empty(trim($label)) && !empty(trim($description))){
        $date_add = new DateTime('now');

        require("./../../includes/connect.php");

        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.ateliers(label, description, date_add) VALUES(:label, :description, :date_add)');

        $requete->bindvalue(':label', $label);
        $requete->bindvalue(':description', $description);
        $requete->bindvalue(':date_add', $date_add->format('Y-m-d H:i:s'));

        $resultat = $requete->execute();

        if($resultat)  $message =  'success';
    }
    echo($message);die();
?>