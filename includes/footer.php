<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

if(isset($_POST['newsletter']))
{
    if(empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $message =  'Rentrer une adresse email valide !';
    }

    else
    {

        require __DIR__ . '/connect.php';

        $req = $bdd->prepare('SELECT * FROM db_wizkitchen.newsletter WHERE email = :email');
        $req->bindvalue(':email', $_POST['email']);
        $req->execute();
        $result = $req->fetch();

        if($result)
        {
            $message = "L'adresse email que vous avez choisie a déja été enregistrée";
        }
        else
        {

            $date_add = new DateTime('now');

            $requete = $bdd->prepare('INSERT INTO db_wizkitchen.newsletter(email, date_add, active) VALUES(:email, :date_add, :active)');

            $requete->bindvalue(':email', $_POST['email']);

            $requete->bindvalue(':date_add', $date_add->format('Y-m-d H:i:s'));

            $requete->bindvalue(':active', true);

            $requete->execute();


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
            // Contenu du message


            //Content
            $mail->isHTML(true); //Set email format to HTML

            if(!$mail->send()){
                $message = "Mail non envoyé";
                echo 'Erreurs:'.$mail->ErrorInfo;
            }else{
                $message1 =  "Nous vous avons envoyé par courrier des instructions pour confirmer
             votre adresse e-mail que vous avez fournie.
             Vous devriez bientôt les recevoir.";
            }
        }
    }
}

?>

<footer>
    <div class="footer">
        <center>
            <div class="container" style="background-color:#FB6969;">
                <font color="#8B0505">
                    <?php if(isset($message)) echo $message;?>
                </font>
            </div>
        </center>
        <center>
            <div class="container" style="background-color:#69fb6b;">
                <font color="#8B0505">
                    <p class="msg-success"><?php if(isset($message1)) echo $message1;?></p>
                </font>
            </div>
        </center>
        <div class="container">

            <section class="section_item">
                <div class="container">
                    <div class="wrap_section_title"><h1 class="titlesection">Newsletter</h1> <p class="section_description">subscribe to our newsletter &amp; stay updated</p></div>
                    <div class="wrap_content_newsletter">
                        <form autocomplete="off" class="form" action="" method="post" id="form-newsletter-id">
                            <div class="content_newsletter row">
                                <div class="input_main col-sm-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                    </svg>
                                    <input type="email" name="email" placeholder="Your Email">
                                </div>
                                <input class="submit-btn" type="submit" value="S'inscrire" name="newsletter">
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <div class="content_footer">

                <div class="container_widget">
                    <ul class="widget_footer widget_footer_1">
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Conditions d’achats</a></li>
                    </ul>
                    <ul class="widget_footer">
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Nous contacter</a></li>
                        <li><a href="#">Engagements</a></li>
                    </ul>
                    <ul class="widget_footer">
                        <li><a href="#">Ateliers</a></li>
                        <li><a href="#">Abonnements</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                    <div class="content_logo_footer">
                        <img src="assets/images/logo-2.png" alt="">
                    </div>
                </div>
                <div class="container_social_link">
                    <a href="https://www.instagram.com/p/CpiJUEtINKR/">
                        <img src="assets/images/social/insta.png" alt="">
                    </a>
                    <a href="https://www.linkedin.com/in/wizkitchen-france-b869b0273/">
                        <img src="assets/images/social/lind.svg" alt="">
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100091818771987">
                        <img src="assets/images/social/facebk.svg" alt="">
                    </a>
                </div>

            </div>
        </div>
    </div>
</footer>
<script>
    // //Get form element
    // var form=document.getElementById("form-newsletter-id");
    // function submitForm(event){
    //     //Preventing page refresh
    //     event.preventDefault();
    // }
    //
    // //Calling a function during form submission.
    // form.addEventListener('submit', submitForm);
</script>