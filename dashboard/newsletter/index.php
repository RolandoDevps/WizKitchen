<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="./../dashboard.css">
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
                                while ($newsletter = $response->fetch())

                                {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $newsletter['id']; ?></th>
                                        <td><?php echo $newsletter['email']; ?></td>
                                        <td><?php echo $newsletter['date_add']; ?></td>
                                        <td align="right">
                                            <i class="fas fa-eye text-info table-action-item"></i>
                                            <i class="fas fa-edit mx-4 primary-text table-action-item"></i>
                                            <i class="fas fa-trash text-danger table-action-item"></i>
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

    <!-- Rest of page -->
    <?php require "../includes/always-include.php"; ?>
    <!-- /# -->