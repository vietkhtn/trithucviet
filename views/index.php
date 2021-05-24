<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/bootstrap/css/sidebars.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <!--======================== navbar====================================================================== -->
            <?php include './partials/navbar.php'; ?>
            <!--======================== navbar END====================================================================== -->
        </div>
        <div class="row">
            <div class="col-md-2" style="padding: 0rem;">
                <!--======================== sidebar====================================================================== -->
                <?php include 'partials/sidebar.php'; ?>
                <!--======================== sidebar END====================================================================== -->
            </div>

            <div class="col-md-10" style="border-left-style: groove;border-left-color: #D6D9DC;padding-left: 18px;">
                <div class="row" style="height: 90px; align-items: center;">
                    <div class="col-md-10">
                        <h2 style="font-weight: 400;">All Questions</h2>
                    </div>
                    <div class="col-md-2" style="text-align: end;">
                        <div class="col-md-auto" style="padding-left: 0.2rem;">
                            <button type="button" class="btn btn-primary" style="background-color: #52A3DC;">Ask Question</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div style="font-family: cursive; font-size: large;">342 questions with bounties</div>
                    </div>
                    <div class="col-md-6">
                        <nav class="navbar navbar-light" style="    padding: 0rem;border-left-style: groove;border-right: groove;border-top: groove;border-bottom: groove;">
                            <div class="col-md-2">
                                <span>Newest</span>
                            </div>
                            <div class="col-md-2">
                                <span>Active</span>
                            </div>
                            <div class="col-md-3">
                                <span>Bountied</span>
                            </div>
                            <div class="col-md-3">
                                <span>Unanswered</span>
                            </div>
                            <div class="col-md-2">
                                <span>More</span>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        Fiter
                    </div>
                </div>

                <p>This sidebar is of full height (100%) and always shown.</p>
                <p>Scroll down the page to see the result.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,<br> maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te, <br>id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo, <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br> id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,<br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te, <br>id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo, <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br> id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
            </div>

        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/popper.js"></script>
    <script src="../assets/bootstrap/js/sidebars.js"></script>
</body>

</html>