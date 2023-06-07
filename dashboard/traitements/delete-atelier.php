<?php
    $atelier_id = strip_tags($_POST['atelier_id'] );

        require("./../../includes/connect.php");

        $stmt = $bdd->prepare('DELETE FROM db_wizkitchen.ateliers WHERE id=:id');
        $stmt->bindValue(':id', $atelier_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>