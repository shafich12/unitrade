<?php
include_once("inc/header.php");
$users = select_all_users();
?>  
<!-- Page Body Start-->
<div class="page-body-wrapper">
<?php
include_once("inc/sidebar.php")
?>

<div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>User List
                                    <small>UniTrade Admin Panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                               
                                <li class="breadcrumb-item active">User List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>User Details</h5>
                    </div>
                    <div class="card-body">
                       
                        <div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">University</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                 
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $user){ ?>
                                  <tr>
                                    <th scope="row"><?php echo $user['username'] ?></th>
                                    <td><?php echo $user['first_name']." ".$user['last_name'] ?></td>
                                    <td><?php echo $user['user_school'] ?></td>
                                    <td><?php echo $user['user_email'] ?></td>
                                    <td><?php echo $user['user_contact'] ?></td>
                                 
                                 
                                  </tr>
                                <?php } ?>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>


<?php
include_once('inc/footer.php');
?>
