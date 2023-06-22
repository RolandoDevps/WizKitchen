<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    if(empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $message =  'failed';
    }
    else{
        $date_add = new DateTime('now');

        require("./../../includes/connect.php");

        $requete = $bdd->prepare('INSERT INTO db_wizkitchen.newsletter(email, date_add, active) VALUES(:email, :date_add, :active)');

        $requete->bindvalue(':email', $_POST['email']);

        $requete->bindvalue(':date_add', $date_add->format('Y-m-d H:i:s'));

        $requete->bindvalue(':active', true);

        $resultat = $requete->execute();


        $mail = new PHPMailer();
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pharelngoualem@gmail.com';                     //SMTP username
        $mail->Password   = 'thaztxrhbhhkrwij';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('pharelngoualem@gmail.com', 'pharelngoualem');                         // Adresse e-mail de l'expéditeur
        $mail->addAddress($_POST['email']);         // Adresse e-mail du destinataire
        $mail->Subject='Confirmation inscription à la newsletter';
        $mail->Body = 'Votre inscription à la newsletter a été éffectuée avec succès </br>
            Pour vous désabonner cliquez sur ce lien:
            <a href="http://localhost/wizkitchen/unsubscribe-newsletter.php?email='.$_POST['email'].' ">Désabonnement</a>';
        //Content
        $mail->isHTML(true); //Set email format to HTML

        if(!$mail->send()){
            $message = "Mail non envoyé";
            echo 'Erreurs:'.$mail->ErrorInfo;
        }else{
            $message =  "Nous vous avons envoyé par courrier des instructions pour confirmer
             votre adresse e-mail que vous avez fournie.
             Vous devriez bientôt les recevoir.";
        }

        if($resultat)  $message =  'success';
    }
    echo($message);die();
?>