<?php
    $task_id = strip_tags($_POST['task_id'] );

    require("connect.php");

        $stmt = $pdo->prepare('DELETE FROM tasks WHERE id=:id');
        $stmt->bindValue(':id', $task_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>