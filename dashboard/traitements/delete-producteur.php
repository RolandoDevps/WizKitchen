<?php
    $producteur_id = strip_tags($_POST['producteur_id'] );

        require("./../../includes/connect.php");

        $stmt = $bdd->prepare('DELETE FROM db_wizkitchen.producteurs WHERE id=:id');
        $stmt->bindValue(':id', $producteur_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>