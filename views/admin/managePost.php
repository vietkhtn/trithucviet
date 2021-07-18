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
                        <h4 class="page-title">Manage Post</h4>
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
                            <h3 class="box-title">Manage Post</h3>
                            <div class="table-responsive">
                                <table class="display table table-hover" id="table_id">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Tags</th>
                                            <th class="border-top-0 ">Content</th>
                                            <th class="border-top-0">Post By</th>
                                            <th class="border-top-0">Is Spam</th>
                                            <th class="border-top-0">Manage</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php forEach ($postsList as $post) { ?>
                                        <tr>
                                            <td><?php echo($post->question_id) ?></td>
                                            <td><?php echo($post->title) ?></td>
                                            <td><?php echo($post->tags) ?></td>
                                            <td><?php echo($post->voteCount) ?></td>
                                            <td><?php echo($post->postBy) ?></td>
                                            <td><?php echo($post->isSpam) ?></td>
                                            <td>
                                                <a href="#lock" class="btnLock" data-toggle="modal"><i class="material-icons" title="Lock">lock</i></a>
                                                <a href="#delete" class="btnDelete" data-toggle="modal"><i class="material-icons" title="Delete">&#xE872;</i></a>
                                            </td>
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
        $(".tab-manage-post").addClass('active');
    </script>

</body>

</html>