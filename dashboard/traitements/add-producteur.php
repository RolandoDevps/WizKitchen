<?php
    $label = $_POST["label"];
    $description = $_POST["description"];
    $fichier = $_FILES["fichier"];

    $message =  'failed';
    $messageFile =  'failed';

    $is_upload = false;

    if(isset($fichier)){

        if($fichier['error'] != UPLOAD_ERR_OK){
            $messageFile = "Erreur";
        }
        $extensions = array('jpg', 'jpeg', 'png', 'gif');
        $extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));

        $fileName = $_FILES['fichier']['name'];
        $final_image = rand(1000,1000000).$fileName;

        $destination = './../../uploads/'.$final_image;

        if(!in_array($extension, $extensions)){
            $messageFile = "Le fichier n'a pas la bonne extension";
        }
        if($fichier['size']>1024*1024){
            $messageFile = "Le fichier est trop grand";
        }
        else {
            $is_upload = move_uploaded_file($fichier['tmp_name'], $destination);
            if(!$is_upload){
                $messageFile = "Erreur, le fichier n'a pas ete deplacer dans le dossier de destiination";
            }
            if(!empty(trim($label)) && !empty(trim($description)) && $is_upload){
                $date_add = new DateTime('now');


                require("./../../includes/connect.php");

                $requete = $bdd->prepare('INSERT INTO db_wizkitchen.producteurs(label, description, image_url, date_add) VALUES(:label, :description, :image_url, :date_add)');

                $requete->bindvalue(':label', $label);
                $requete->bindvalue(':description', $description);
                $requete->bindvalue(':image_url', $final_image);
                $requete->bindvalue(':date_add', $date_add->format('Y-m-d H:i:s'));

                $resultat = $requete->execute();

                if($resultat) {
                    $message = 'success';
                    $messageFile  = 'success';
                }
            }
        }
    }

$response = json_encode([
    "message" => $message,
    "messageFile" => $messageFile
]);

echo($response);die();