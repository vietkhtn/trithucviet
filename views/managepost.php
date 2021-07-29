<?php require '../controllers/adminController.php' ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    
<?php require "../template/admin/index.php" ?>

</head>

<body>

    <div id="main-wrapper" data-layout="vertical" >

    <?php require "../template/admin/header.php" ?>

    <?php require "../template/admin/sidebar.php" ?>

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
                                <table class="table text-nowrap table-hover" id="table_id">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="display: none;"></th>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Tags</th>
                                            <th class="border-top-0 ">postOn</th>
                                            <th class="border-top-0">Post By</th>
                                            <th class="border-top-0">Is Spam</th>
                                            <th class="border-top-0">Manage</th>
                                        </tr>
                                    </thead>
                        
                                    <tbody>
                                        <?php forEach ($postsList as $post) { ?>
                                        <tr class="data">
                                            <td style="display: none; "><?php echo($post->content) ?></td>
                                            <td><?php echo($post->question_id) ?></td>
                                            <td><?php echo($post->title) ?></td>
                                            <td><?php echo($post->tags) ?></td>
                                            <td><?php echo($post->postOn) ?></td>
                                            <td><?php echo($post->postBy) ?></td>
                                            <td><?php echo($post->isSpam) ?></td>
                                            <td>
                                                <a href="#detail" class="btnInfo" data-toggle="modal"><i class="material-icons" title="Detail">info</i></a>
                                                <a href="../controllers/adminController.php?deletepost=<?php echo $post->question_id; ?>" class="btnDelete"><i class="material-icons" title="Delete">&#xE872;</i></a>
                                                <?php if($post->isSpam == 1) { ?>
                                                    <a href="../controllers/adminController.php?approvepost=<?php echo $post->question_id; ?>" class="btnApprove"><i class="material-icons" title="Approve">near_me</i></a>
                                                <?php } ?>
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

            <?php require "../template/admin/footer.php" ?>
            <!-- ============================================================== -->

            <!-- =======================================================================-->

            <div id="detail" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">						
                            <h4 class="modal-title">Content Post</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					

                        </div>
                    </div>
                </div>
            </div>

            <!-- =======================================================================-->
            
        </div>
    </div>

    <?php require "../template/admin/mainscript.php" ?>

    <script>
        $(document).on("click",".data", function() {
            var content = $(this).find("td").eq(0).html();
            $(".modal-body").html(content);
        })
        $(".tab-manage-post").addClass('active');
    </script>

</body>

</html>