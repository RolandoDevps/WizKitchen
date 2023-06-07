<?php
    $avis_id = strip_tags($_POST['avis_id'] );

        require("./../../includes/connect.php");

        $stmt = $bdd->prepare('DELETE FROM db_wizkitchen.avis WHERE id=:id');
        $stmt->bindValue(':id', $avis_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>