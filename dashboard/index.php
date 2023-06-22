<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../font/css/fontawesome-all.min.css">
    <!--========================================Bootstrap====================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>

    <!-- Sidebar -->
    <?php require "./includes/sidebar.php"; ?>
    <?php
        require '../includes/connect.php';

        $responseAtelier = $bdd->query('SELECT COUNT(*) FROM db_wizkitchen.ateliers');
        $totalAteliers = $responseAtelier->fetch()[0];

        $responseBLog = $bdd->query('SELECT COUNT(*) FROM db_wizkitchen.blogs');
        $totalBlogs = $responseBLog->fetch()[0];

        $responseProducteur = $bdd->query('SELECT COUNT(*) FROM db_wizkitchen.producteurs');
        $totalProducteurs = $responseProducteur->fetch()[0];

        // $responsReservation = $bdd->query('SELECT COUNT(*) FROM db_wizkitchen.reservations');
        $totalReservations = 0;

    ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light py-4 px-4 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text mr-2 fs-4" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
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
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $totalAteliers ?></h3>
                            <p class="fs-5">Ateliers</p>
                        </div>
                        <i class="fas fa-fire fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $totalBlogs ?></h3>
                            <p class="fs-5">Blogs</p>
                        </div>
                        <i
                            class="fas fa-capsules fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $totalProducteurs ?></h3>
                            <p class="fs-5">Producteurs</p>
                        </div>
                        <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $totalReservations ?></h3>
                            <p class="fs-5">Réservations</p>
                        </div>
                        <i class="fas fa-save fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>

            <div class="my-5">
                <h3 class="fs-4 mb-3">Ateliers récents</h3>
                <div class="wrap-list-item">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">#id</th>
                            <th style="max-width: 400px;" scope="col">Libellé</th>
                            <th style="max-width: 500px;" scope="col">Description</th>
                            <th scope="col">Date d'ajout</th>
                            <th scope="col" class="table-action">Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require '../includes/connect.php';
                        $response = $bdd->query('SELECT * FROM db_wizkitchen.ateliers ORDER BY id DESC LIMIT 10');

                        // On affiche chaque entrée une à une
                        while ($atelier = $response->fetch()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $atelier['id']; ?></th>
                                <td style="max-width: 400px;" ><?php echo $atelier['label']; ?></td>
                                <td style="max-width: 500px;" ><?php echo $atelier['description']; ?></td>
                                <td><?php echo $atelier['date_add']; ?></td>
                                <td scope="col" class="table-action"><img src="../../uploads/<?php echo $atelier['image_url']; ?>" height="100" width="100"  alt="img"/></td>
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
    <?php require "./includes/always-include.php"; ?>
    <!-- /# -->