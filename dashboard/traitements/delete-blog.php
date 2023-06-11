<?php
    $blog_id = strip_tags($_POST['blog_id'] );

        require("./../../includes/connect.php");

        $stmt = $bdd->prepare('DELETE FROM db_wizkitchen.blogs WHERE id=:id');
        $stmt->bindValue(':id', $blog_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>