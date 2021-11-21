<?php
include_once("loginprocess.php");
include_once("inc/header.php");
?>  


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>customer's login</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Login</h3>
                    <div class="theme-card">
                        <form class="theme-form" action="login.php" method="POST">
                        <?php include('errors.php'); ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" required name="user_email">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass"
                                    placeholder="Enter your password" required name="user_pass">
                            </div><button class="btn btn-solid" name="submit" type="submit">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to buy and sell on our platform. To get started click register.</p><a href="register.php"
                            class="btn btn-solid">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


    
<?php
include_once('inc/footer.php');
?>
