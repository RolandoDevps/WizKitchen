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
                <h2 class="fs-2 m-0">Dashboard / Newsletter</h2>
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

            <div class="wrap_form_newsletter">
                <form class="form-add-newsletter" autocomplete="off" action="" method="post">
                    <div class="content_newsletter row">
                        <div class="input_main col-sm-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                            </svg>
                            <input type="text" id="email" name="email" placeholder="Your Email">
                        </div>
                        <input class="submit-btn" type="submit" value="Ajouter" name="submit-add-newsletter">
                    </div>
                </form>
            </div>

            <div class="my-5">
                <h3 class="fs-4 mb-3">Liste des bulletins d'informations</h3>
                <div class="wrap-list-item">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">#id</th>
                            <th scope="col">email</th>
                            <th scope="col">Date d'inscription</th>
                            <th scope="col" class="table-action">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require '../../includes/connect.php';
                        $response = $bdd->query('SELECT * FROM db_wizkitchen.newsletter ORDER BY id DESC LIMIT 10');

                        // On affiche chaque entrée une à une
                        while ($newsletter = $response->fetch()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $newsletter['id']; ?></th>
                                <td><?php echo $newsletter['email']; ?></td>
                                <td><?php echo $newsletter['date_add']; ?></td>
                                <td align="right">
                                    <i id="<?php echo $newsletter['id']; ?>"
                                       class="fas fa-eye text-info table-action-item"></i>
                                    <i id="<?php echo $newsletter['id']; ?>" class="fas fa-edit mx-4 primary-text table-action-item"></i>
                                    <i id="<?php echo $newsletter['id']; ?>" class="fas fa-trash text-danger table-action-item delete-newsletter"></i>
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
        add_newsletter();
        delete_newsletter();
        function delete_newsletter() {
            $('.delete-newsletter').click(function () {
                var id = $(this).attr('id');

                $.post('traitements/delete-newsletter.php', {newsletter_id: id}, function () {
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload();
                    }, 2000);
                })
            })
        }

        function add_newsletter() {
            $('.form-add-newsletter').submit(function (e) {
                e.preventDefault();
                // var new_task = $('.add-new-task input[name=new-task]').val();
                var email = $('#email').val();
                if (email != '') {
                    $.post('traitements/add-newsletter.php', {email: email}, function (data) {
                        if(data === 'failed'){
                            $('.msg-success').text('')
                            $('.msg-error').text('Rentrer une adresse email valide !');
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
