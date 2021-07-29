<?php require '../controllers/tagController.php';   ?>

<!DOCTYPE html>
<html lang="en">

<?php include './partials/head.php'; ?>

<body>
    <div class="container" style="margin-left: 1.8rem;margin-right: 1.8rem;max-width: 1370px">
        <div class="row" style="position: fixed;display: inline;width: 86rem;">
            <!--======================== navbar====================================================================== -->
            <?php include './partials/navbar.php'; ?>
            <!--======================== navbar END====================================================================== -->
        </div>
        <div class="row">
            <div class="col-md-2" style="padding: 0rem;position: fixed;padding-top: 60px;width: fit-content;">
                <!--======================== sidebar====================================================================== -->
                <?php include 'partials/sidebar.php'; ?>
                <!--======================== sidebar END====================================================================== -->
            </div>
            <div class="col-md-2" style="border-right-style: inset;border-width: 2px;"></div>
            <div class="col-md-10" style="padding-top: 56px;">
               <?php include 'partials/headTagContent.php'; ?>
                <?php include 'partials/listTag.php'; ?>
               
                


            </div>

        </div>

    </div>
    <?php include 'partials/footer.php';?>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/popper.js"></script>
    <script src="../assets/bootstrap/js/sidebars.js"></script>
</body>

</html>