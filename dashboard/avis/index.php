<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../font/css/fontawesome-all.min.css">
    <!--========================================Bootstrap====================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
</head>

<!-- Sidebar -->
<?php require "../includes/sidebar.php"; ?>
<!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light py-4 px-4 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text mr-2 fs-4" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard / Avis</h2>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user mr-2"></i>Ariel
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid px-4">
            <center>
                <div class="container" style="background-color:#FB6969;">
                    <font color="#8B0505">
                        <p class="msg-error"></p>
                    </font>
                </div>
            </center>
            <center>
                <div class="container" style="background-color:#69fb6b;">
                    <font color="#8B0505">
                        <p class="msg-success"></p>
                    </font>
                </div>
            </center>

            <div class="wrap_form_avis">
                <form class="form-add-avis" autocomplete="off" action="" method="post">
                    <div class="content_avis row">
                        <div class="input_main col-sm-5">
                            <i class="fa fa-user mr-3"></i>
                            <input type="text" id="author" name="author" placeholder="Author name">
                        </div>
                        <div class="input_main col-sm-5">
                            <i class="fa fa-paper-plane mr-3"></i>
                            <input type="text" id="subject" name="subject" placeholder="Subject">
                        </div>
                        <div class="input_main col-sm-1">
                            <i class="fa fa-hand-paper mr-3"></i>
                            <input type="number" id="rating" name="rating" placeholder="__ / 5">
                        </div>
                    </div>
                    <div class="content_avis row mt-3">
                        <div class="col-sm-2 wrap-inage mr-2">
                            Drag & drop image
                        </div>
                        <div class="col-sm-9">
                            <textarea placeholder="Commentaire" name="content" id="content"></textarea>
                        </div>
                    </div>
                    <input class="submit-btn mt-2" type="submit" value="Ajouter" name="submit-add-avis">
                </form>
            </div>

            <div class="my-5">
                <h3 class="fs-4 mb-3">Liste des bulletins d'informations</h3>
                <div class="wrap-list-item">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">#id</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Sujet</th>
                            <th scope="col">Notation</th>
                            <th scope="col">Date d'ajout</th>
                            <th scope="col" class="table-action">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require '../../includes/connect.php';
                        $response = $bdd->query('SELECT * FROM db_wizkitchen.avis ORDER BY id DESC LIMIT 10');

                        // On affiche chaque entrée une à une
                        while ($avis = $response->fetch()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $avis['id']; ?></th>
                                <td><?php echo $avis['author']; ?></td>
                                <td><?php echo $avis['subject']; ?></td>
                                <td><?php echo $avis['rating']; ?></td>
                                <td><?php echo $avis['date_add']; ?></td>
                                <td align="right">
                                    <i id="<?php echo $avis['id']; ?>"
                                       class="fas fa-eye text-info table-action-item"></i>
                                    <i id="<?php echo $avis['id']; ?>" class="fas fa-edit mx-4 primary-text table-action-item"></i>
                                    <i id="<?php echo $avis['id']; ?>" class="fas fa-trash text-danger table-action-item delete-avis"></i>
                                </td>
                            </tr>
                            <?php

                        }
                        $response->closeCursor(); // Termine le traitement de la requête
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    </div>

    <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
        add_avis();
        delete_avis();
        function delete_avis() {
            $('.delete-avis').click(function () {
                var id = $(this).attr('id');

                $.post('traitements/delete-avis.php', {avis_id: id}, function () {
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload();
                    }, 2000);
                })
            })
        }

        function add_avis() {
            $('.form-add-avis').submit(function (e) {
                e.preventDefault();
                // var new_task = $('.add-new-task input[name=new-task]').val();
                var content = $('#content').val();
                var author = $('#author').val();
                var rating = $('#rating').val();
                var subject = $('#subject').val();
                console.log(`{
                    ${content}, ${author}, ${rating}, ${subject}
                }`)
                if (content !== ''&& author !== '' && rating >= 0 && subject !== '') {
                    $.post('traitements/add-avis.php', {
                        content: content,
                        author: author,
                        rating: rating,
                        subject: subject,
                    }, function (data) {
                        if(data === 'failed'){
                            $('.msg-success').text('')
                            $('.msg-error').text('Renseignez tous les champs !');
                        }
                        if(data === "success"){
                            $('.msg-error').text('')
                            $('#email').val('');
                            $('.msg-success').text('Enregistrement effectué avec succès');
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload();
                            }, 2000);
                        }
                    })
                }
                else $('.msg-error').text('Renseignez tous les champs !');
            })
        }

        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
