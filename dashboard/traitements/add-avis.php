<?php
    $author = $_POST["author"];
    $rating = $_POST["rating"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $message =  'failed';

    if(!empty(trim($author)) && !empty(trim($rating)) && !empty(trim($subject)) && !empty(trim($content))){
        $date_add = new DateTime('now');

        require("./../../includes/connect.php");

        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.avis(author, subject, rating, content, date_add) VALUES(:author, :subject, :rating, :content, :date_add)');

        $requete->bindvalue(':author', $author);
        $requete->bindvalue(':subject', $subject);
        $requete->bindvalue(':rating', $rating);
        $requete->bindvalue(':content', $content);
        $requete->bindvalue(':date_add', $date_add->format('Y-m-d H:i:s'));

        $resultat = $requete->execute();

        if($resultat)  $message =  'success';
    }
    echo($message);die();
?>