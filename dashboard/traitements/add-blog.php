<?php
$label = $_POST["label"];
$description = $_POST["description"];
$fichier = $_FILES["fichier"];

$message = 'failed';
$messageFile = 'failed';

if (!empty(trim($label)) && !empty(trim($description))) {
    $date_add = new DateTime('now');
    $is_upload = false;

    require("./../../includes/connect.php");

    if (isset($fichier)) {
        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.blogs (label, description, date_add, image_url) VALUES (:label, :description, :date_add, :image_url)');

        if ($fichier['error'] != UPLOAD_ERR_OK) {
            $messageFile = "Erreur lors de l'upload du fichier";
        }

        $extensions = array('jpg', 'jpeg', 'png', 'gif');
        $extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));

        $requete->bindValue(':label', $label);
        $requete->bindValue(':description', $description);
        $requete->bindValue(':date_add', $date_add->format('Y-m-d H:i:s'));

        $fileName = $_FILES['fichier']['name'];
        $final_image = rand(1000, 1000000) . $fileName;
        $destination = './../../uploads/' . $final_image;

        if (!in_array($extension, $extensions)) {
            $messageFile = "Le fichier n'a pas la bonne extension";
        } elseif ($fichier['size'] > 1024 * 1024) {
            $messageFile = "Le fichier est trop grand";
        } elseif (move_uploaded_file($fichier['tmp_name'], $destination)) {
            $requete->bindValue(':image_url', $final_image);

            $resultat = $requete->execute();

            if ($resultat) {
                $message = 'success';
                $messageFile = 'success';
            } else {
                $messageFile = "Erreur lors de l'insertion dans la base de données";
            }
        } else {
            $messageFile = "Erreur, le fichier n'a pas été déplacé dans le dossier de destination";
        }
    } else {
        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.blogs (label, description, date_add) VALUES (:label, :description, :date_add)');

        $requete->bindValue(':label', $label);
        $requete->bindValue(':description', $description);
        $requete->bindValue(':date_add', $date_add->format('Y-m-d H:i:s'));

        $resultat = $requete->execute();

        if ($resultat) {
            $message = 'success';
        } else {
            $messageFile = "Erreur lors de l'insertion dans la base de données";
        }
    }
}

$response = json_encode([
    "message" => $message,
    "messageFile" => $messageFile
]);

echo $response;
die();
?>
