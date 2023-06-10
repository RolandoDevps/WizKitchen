<?php
    $label = $_POST["label"];
    $description = $_POST["description"];
    //$is_like = $_POST["is_like"];

    $message = 'failed';

    if (!empty(trim($label)) && !empty(trim($description))) {
        $date_add = new DateTime('now');

        require("./../../includes/connect.php");

        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.blogs (label, description, date_add) VALUES (:label, :description, :date_add)');

        $requete->bindValue(':label', $label);
        $requete->bindValue(':description', $description);
//$requete->bindValue(':is_like', $is_like);
        $requete->bindValue(':date_add', $date_add->format('Y-m-d H:i:s'));
        $resultat = $requete->execute();
        if ($resultat)  $message = 'success'; 
           
        } 
        echo $message;
        die();
    
?>
