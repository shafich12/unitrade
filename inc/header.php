<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once(__DIR__.'/../settings/core.php');
    $categories = select_all_categories_controller();
    check_logout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="assets/images/favicon/20.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon/20.png" type="image/x-icon">
    <title>UniTrade</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>

<body class="theme-color-23">

    <!-- header start -->
    <header class="header-style-5">
        <div class="mobile-fix-option"></div>
        <div class="top-header top-header-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to UniTrade</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: +233 24 123 4567</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                                My Account
                                <ul class="onhover-show-div">
                                <?php if(!is_login()) :?>
                                        <li><a href="login/login.php">Login</a></li>
                                        <li><a href="login/register.php">register</a></li>
                                    <?php else: ?>
                                        <li><a href="view/dashboard.php">Dashboard</a></li>
                                        <li><a href="?logout=1">Logout</a></li>
                                    <?php endif ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="navbar d-block d-xl-none">
                                <a href="javascript:void(0)">
                                    <div class="bar-style" id="toggle-sidebar-res"><i class="fa fa-bars sidebar-bar"
                                            aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="brand-logo">
                                <a href="index.php"><img src="assets/images/icon/logo/29.png"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <form class="form_search" role="form" action="view/search-results.php" method="GET">
                                <input id="query search-autocomplete" type="search"
                                    placeholder="Search Listings..." class="nav-search nav-search-field"
                                    aria-expanded="true" name="search">
                                <button type="submit" class="btn-search">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="menu-right pull-right">
                            <nav class="text-start">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                            </nav>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div d-xl-none d-inline-block mobile-search">
                                            <div><img src="assets/images/icon/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"
                                                    onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div> <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form action="view/search-results.php" method="GET">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Search a Product" name="search">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="assets/images/icon/cart.png"
                                                    class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-shopping-cart"></i></div>
                                            <span class="cart_qty_cls">2</span>
                                            <ul class="show-div shopping-cart">
                                                <li>
                                                    <div class="media">
                                                        <a href="#"><img alt="" class="me-3"
                                                                src="assets/images/fashion/product/1.jpg"></a>
                                                        <div class="media-body">
                                                            <a href="#">
                                                                <h4>item name</h4>
                                                            </a>
                                                            <h4><span>1 x $ 299.00</span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                                aria-hidden="true"></i></a></div>
                                                </li>
                                                <li>
                                                    <div class="media">
                                                        <a href="#"><img alt="" class="me-3"
                                                                src="assets/images/fashion/product/2.jpg"></a>
                                                        <div class="media-body">
                                                            <a href="#">
                                                                <h4>item name</h4>
                                                            </a>
                                                            <h4><span>1 x $ 299.00</span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                                aria-hidden="true"></i></a></div>
                                                </li>
                                                <li>
                                                    <div class="total">
                                                        <h5>subtotal : <span>$299.00</span></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="buttons"><a href="cart.html" class="view-cart">view
                                                            cart</a> <a href="#" class="checkout">checkout</a></div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part bottom-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="category-menu d-none d-xl-block h-100">
                            <div id="toggle-sidebar" class="toggle-sidebar">
                                <i class="fa fa-bars sidebar-bar"></i>
                                <h5 class="mb-0">shop by category</h5>
                            </div>
                        </div>
                        <div class="sidenav fixed-sidebar marketplace-sidebar">
                            <nav>
                                <div>
                                    <div class="sidebar-back text-start d-xl-none d-block"><i
                                            class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
                                </div>
                                <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                    <?php foreach($categories as $cats){  ?>
                                        <li><a href="view/product.php?cat_id=<?php echo $cats['cat_id'] ?>"><?php echo $cats['cat_name']?></a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="main-nav-center">
                            <nav class="text-start">
                                <!-- Sample menu definition -->
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="view/category.php">Catalogue</a></li>
                                    <li><a href="view/help.php">Help</a></li>
                                    <li><a href="view/contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->