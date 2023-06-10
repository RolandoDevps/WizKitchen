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
                <h2 class="fs-2 m-0">Dashboard / Producteurs</h2>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user mr-2"></i>John Doe
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

            <div class="wrap_form_blog">
                 <form class="form-add-blog" autocomplete="off" action="" method="post">
                    <div class="content_blog row">
                        <div class="input_main col-sm-5">
                            <i class="fa fa-tags mr-3"></i>
                            <input type="text" id="label" name="label" placeholder="Libelle du blog">
                        </div>
                    </div>
                    <div class="content_blog row mt-3">
                        <div class="col-sm-2 wrap-inage mr-2">
                            Drag & drop image
                        </div>
                        <div class="col-sm-9">
                            <textarea placeholder="Description" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <input class="submit-btn mt-2" type="submit" value="Ajouter" name="submit-add-blog">
                </form>
            </div>

            <div class="my-5">
                <h3 class="fs-4 mb-3">Liste des bulletins d'informations</h3>
                <div class="wrap-list-item">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">#id</th>
                            <th scope="col">Libellé</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date d'ajout</th>
                            <th scope="col">Like</th>
                            <th scope="col" class="table-action">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require '../../includes/connect.php';
                        $response = $bdd->query('SELECT * FROM db_wizkitchen.blogs ORDER BY id DESC LIMIT 10');

                        // On affiche chaque entrée une à une
                        while ($blog = $response->fetch()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $blog['id']; ?></th>
                                <td><?php echo $blog['label']; ?></td>
                                <td><?php echo $blog['description']; ?></td>
                                <td><?php echo $blog['date_add']; ?></td>
                                <td><?php echo $blog['is_like']; ?></td>
                                <td align="right">
                                    <i id="<?php echo $blog['id']; ?>"
                                       class="fas fa-eye text-info table-action-item"></i>
                                    <i id="<?php echo $blog['id']; ?>" class="fas fa-edit mx-4 primary-text table-action-item"></i>
                                    <i id="<?php echo $blog['id']; ?>" class="fas fa-trash text-danger table-action-item delete-blog"></i>
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
        add_blog();
        delete_blog();
        function delete_blog() {
            $('.delete-blog').click(function () {
                var id = $(this).attr('id');

                $.post('traitements/delete-blog.php', {blog_id: id}, function () {
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload();
                    }, 2000);
                })
            })
        }

        function add_blog() {
            $('.form-add-blog').submit(function (e) {
                e.preventDefault();
                // var new_task = $('.add-new-task input[name=new-task]').val();
                var label = $('#label').val();
                var description = $('#description').val();
                 //var is_like = $('#is_like').val();
                console.log(`{
                    ${label}, ${description},
                }`)
                if (label !== '' && description !== '') {
                    $.post('traitements/add-blog.php', {
                        label: label,
                        description: description,
                       // is_like:is_like,
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
