<?php
include_once(__DIR__.'/../controllers/product-controller.php');
include_once(__DIR__.'/../controllers/user-controller.php');
if(isset($_GET['id'])){
    $user = select_one_user_id_controller($_GET['id']);
    $address = select_user_shipping_address($_GET['id']);
}
include_once("inc/header.php");
?>  

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>profile</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- personal deatail section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>SHIPPING ADDRESS</h3>
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" id="home-ploat" placeholder="First Name"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Last Name</label>
                                <input type="text" class="form-control" id="address-two" placeholder="Last Name"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Phone</label>
                                <input type="text" class="form-control" id="zip-code" placeholder="Phone"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Address</label>
                                <input type="text" class="form-control" id="city" placeholder="Street Address" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">City *</label>
                                <input type="text" class="form-control" id="city" placeholder="City" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Region/State *</label>
                                <input type="text" class="form-control" id="region-state" placeholder="Region/state"
                                    required="">
                            </div>

                            <div class="col-md-12" style="margin-bottom: 5rem;">
                                <button class="btn btn-sm btn-solid" type="submit">Update profile</button>
                            </div>
                   
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

<?php
include_once('inc/footer.php');
?>
