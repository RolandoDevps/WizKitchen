<?php
require "includes/header.php";
?>

<section class="section_item">
  <div class="fond-5"></div>
  <div class="container">
    <div class="content_item">
    <?php
        require "includes/connect.php";
        $response = $bdd->query('SELECT * FROM db_wizkitchen.ateliers ORDER BY id DESC LIMIT 4');
        $i = 0;
        // On affiche chaque entrée une à une
        while ($atelier = $response->fetch()) {
            $i +=1 ;
        ?>
          <div class="custo-card card-atelier row mt-5 <?php if($i % 2 == 0) echo "inverse" ?>">
            <div class="card_img col-sm-12 col-md-6">
              <img src="../uploads/<?php echo $atelier['image_url']; ?>" height="100" width="100" alt="img"/>
            </div>
            <div class="card_description col-md-6 col-sm-12">
              <h2><?php echo $atelier['label']; ?></h2>
              <p>
                  <?php echo $atelier['description']; ?>
              </p>
              <div class="container_btn_link">
                <a href="#" class="btn_link color_marron">Découvrir</a>
              </div>
            </div>
          </div>
        <?php
            }
        $response->closeCursor(); // Termine le traitement de la requête
        ?>
    </div>
  </div>
</section>


<section class="section_item section2">
  <div class="fond-2"></div>
  <div class="fond-3"></div>
  <div class="container">
    <div class="content_item">
      <div class="custo-card no_image mt-12 mb-12 row">
          <div class="card_img col-sm-12 col-md-6">
              <img src="../uploads/96634311.png" height="100" width="100" alt="img"/>
          </div>
          <div class="card_description col-sm-12 col-md-6">
              <h2 class="color_f9ede6">Nos producteurs</h2>
              <p class="color_fffbf9">L’équipe Wiz s'implique au maximum pour respecter les 2 choses les plus
                  importantes à nos yeux, votre corps et notre planète ! C’est pourquoi nous collaborons avec de petits
                  producteurs qui proposent des produits bio, des associations ou organismes locaux qui souhaitent faire
                  évoluer les habitudes de consommation avec nous.</p>
              <div class="container_btn_link">
                  <a href="../nos-producteurs.php" class="btn_link color_e4c9b9">Découvrir</a>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>



<section class="section_item producteurs">
    <div class="container">
        <div class="content_item">
            <div class="custo-card card-atelier row mt-5">
                <div class="card_img col-sm-12 col-md-6">
                    <img src="assets/images/items/8.png" alt="">
                </div>
                <div class="card_description col-md-6 col-sm-12">
                    <h2>Les partenariats</h2>
                    <p>dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap</p>
                    <div class="container_btn_link">
                        <a href="../nos-producteurs.php" class="btn_link color_marron">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "includes/footer.php"; ?>