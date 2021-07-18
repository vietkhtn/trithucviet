<?php require '../../controllers/adminController.php' ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    
<?php require "../../template/admin/index.php" ?>

</head>

<body>

    <div id="main-wrapper" data-layout="vertical" >

    <?php require "../../template/admin/header.php" ?>

    <?php require "../../template/admin/sidebar.php" ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Basic Table</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                to Pro</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Basic Table</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="table_id">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">First Name</th>
                                            <th class="border-top-0">Last Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">BirthDay</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php forEach ($usersList as $user) { ?>
                                            <tr>
                                            <td><?php echo($user->user_id) ?></td>
                                            <td><?php echo($user->first_name) ?></td>
                                            <td><?php echo($user->last_name) ?></td>
                                            <td><?php echo($user->email) ?></td>
                                            <td><?php echo($user->birthday) ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->

            <?php require "../../template/admin/footer.php" ?>
            <!-- ============================================================== -->
            
        </div>
    </div>

    <?php require "../../template/admin/mainscript.php" ?>

    <script>
        $(".tab-manage-user").addClass('active');
    </script>

</body>

</html>