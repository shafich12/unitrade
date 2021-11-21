<?php
include_once("registerprocess.php");
include_once("inc/header.php");
?>  


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">
                    <?php include('errors.php'); ?>
                        <form class="theme-form" method="POST" action="register.php" enctype="multipart/form-data">
                            
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        required name="username">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone Number"
                                        required name="user_contact">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="First Name"
                                        required name="first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name"
                                        required name="last_name">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="register-email">email</label>
                                    <input type="email" class="form-control" id="register-email" placeholder="Email" required name="user_email">
                                </div>
                                <div class="col-md-6">
                                    <label for="school">University</label>
                                    <input type="text" class="form-control" id="school" disabled name="user_school">
                                </div>
                                <div class="col-md-6">
                                    <label for="pass1">Password</label>
                                    <input type="password" class="form-control" id="pass1" placeholder="Enter your password" required name="password1">
                                </div>
                                <div class="col-md-6">
                                    <label for="pass2">Confirm Password</label>
                                    <input type="password" class="form-control" id="pass2"
                                        placeholder="Confirm your password" required name="password2">
                                </div>
                                </div><button class="btn btn-solid w-auto" type="submit" name="submit">Create Account</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

<?php
include_once('inc/footer.php');
?>
