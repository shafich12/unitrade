<?php
include_once(__DIR__.'/../../../settings/core.php');
include_once(__DIR__.'/../../../controllers/product-controller.php');
include_once(__DIR__.'/../../../controllers/user-controller.php');
if(!is_admin()){
    header("location: ../../");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../../assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>UniTrade Admin</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/prism.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/chartist.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
</head>

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left d-lg-none w-auto">
                    <div class="logo-wrapper"><a href="index.php"><img class="blur-up lazyloaded"
                                src="../../assets/images/dashboard/multikart-logo.png" alt=""></a></div>
                </div>

                <div class="nav-right col">
                    <ul class="nav-menus">
                        <li></li>

                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
        <!-- Page Header Ends -->