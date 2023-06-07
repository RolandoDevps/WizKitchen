<?php
    $newsletter_id = strip_tags($_POST['newsletter_id'] );

        require("./../../includes/connect.php");

        $stmt = $bdd->prepare('DELETE FROM db_wizkitchen.newsletter WHERE id=:id');
        $stmt->bindValue(':id', $newsletter_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>