<?php
    if(empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $message =  'failed';
    }
    else{
        $date_add = new DateTime('now');

        require("./../../includes/connect.php");

        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.newsletter(email, date_add, active) VALUES(:email, :date_add, :active)');

        $requete->bindvalue(':email', $_POST['email']);

        $requete->bindvalue(':date_add', $date_add->format('Y-m-d H:i:s'));

        $requete->bindvalue(':active', true);

        $resultat = $requete->execute();

        if($resultat)  $message =  'success';
    }
    echo($message);die();
?>