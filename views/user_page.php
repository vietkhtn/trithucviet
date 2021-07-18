<?php require '../controllers/userIndexController.php'?>
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
                <?php include './partials/userPage/headContent.userPage.php';?>
                <div class="row">
                    <?php forEach ($usersList as $user){ ?>
                    <div class="col-md-auto" style="padding-top: 10px;padding-bottom: 36px;margin-top: 5px;">
                        <img src="../assets/image/HaiLe.jpg" alt="" style="height: 52px;width: 52px;">
                    </div>
                    <div class="col-md-3" style="padding-top: 10px;    padding-right: 70px;">
                        <div class="row">
                            <a href=""
                                style="text-decoration: none;padding-left: 0px;font-size: 18px;font-family: cursive;">
                                <?php echo($user->first_name .' '.$user->last_name) ?>
                            </a>
                        </div>
                        <div class="row" style="font-size: 14px;font-family: cursive;"><?php echo($user->religion) ?>
                        </div>
                        <div class="row" style="font-size: 14px;font-weight: 700;color: gray;">
                            <?php echo($user->countQuestion) ?></div>
                        <div class="row" style="font-size: 12px;font-family: cursive;overflow: hidden;"><?php echo($user->tags) ?> </div>
                    </div>
                    <?php } ?>
                </div>

            </div>

        </div>

    </div>
    <?php include 'partials/footer.php';?>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/popper.js"></script>
    <script src="../assets/bootstrap/js/sidebars.js"></script>
</body>

</html>