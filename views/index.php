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
            <div class="col-md-2" style="border-right-style: groove;"></div>
            <div class="col-md-10" style="padding-top: 56px;">
                <div class="row" style="height: 90px; align-items: center;">
                    <div class="col-md-10">
                        <h2 style="font-weight: 400;">All Questions</h2>
                    </div>
                    <div class="col-md-2" style="text-align: end;">
                        <div class="col-md-auto" style="padding-left: 0.2rem;">
                            <button type="button" class="btn btn-primary" style="background-color: #52A3DC;">Ask
                                Question</button>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-bottom-style: groove;padding-bottom: 10px;">
                    <div class="col-md-5">
                        <div style="font-family: cursive; font-size: 24px;">342 questions with bounties</div>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary">Newest</button>
                            <button type="button" class="btn btn-outline-secondary">Active</button>
                            <button type="button" class="btn btn-outline-secondary" style="display: inline;">Bountied
                                <div class="badge bg-primary text-wrap"
                                    style="width: 2.2rem;height: 1.1rem;padding: 0.2em 0.2em;">
                                    349
                                </div>
                            </button>
                            <button type="button" class="btn btn-outline-secondary">Unanswered</button>
                            <button id="btnGroupDrop1" type="button" class="btn  btn-outline-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item" href="#">Frequent</a></li>
                                <li><a class="dropdown-item" href="#">Votes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1">

                        <button type="button" class="btn btn-outline-secondary"
                            style="background-color: #DDEBF5;color: cornflowerblue; height: 40px; width:84px">
                            <span class="material-icons" style="font-size: 18px;">
                                settings
                            </span>
                            Filter
                        </button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-1" style="text-align: center;font-family: cursive;">
                        <div >
                            <div class="col-md-row">1</div>
                            <div class="col-md-row" style="padding-bottom: 6px;">votes</div>
                        </div>

                        <div style="border-color: #5EBA7D;border-style: solid;border-radius: 5px;border-width: 1.8px;">
                            <div class="col-md-row">2</div>
                            <div class="col-md-row">answers</div>
                        </div>
                        <!-- <div style="border-color: #5EBA7D;border-style: solid;border-radius: 5px;border-width: 1.8px;color: white;font-weight: 600;background-color: #5EBA7D;">
                            <div class="col-md-row">2</div>
                            <div class="col-md-row">answers</div>
                        </div> -->
                        <div class="col-md-row" style="padding-top: 10px;">702 views</div>
                    </div>
                </div>

                <p>This sidebar is of full height (100%) and always shown.</p>
                <p>Scroll down the page to see the result.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,<br>
                    maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te, <br>id
                    agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no
                    quo,<br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,
                    <br>id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his
                    ad. Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>This sidebar is of full height (100%) and always shown.</p>
                <p>Scroll down the page to see the result.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,<br>
                    maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te, <br>id
                    agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no
                    quo,<br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,
                    <br>id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his
                    ad. Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>This sidebar is of full height (100%) and always shown.</p>
                <p>Scroll down the page to see the result.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,<br>
                    maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te, <br>id
                    agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no
                    quo,<br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,
                    <br>id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his
                    ad. Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>This sidebar is of full height (100%) and always shown.</p>
                <p>Scroll down the page to see the result.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,<br>
                    maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te, <br>id
                    agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.</p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no
                    quo,<br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,
                    <br>id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his
                    ad. Eum no molestiae voluptatibus.
                </p>
                <p>Some text to enable scrolling.. <br>Lorem ipsum dolor sit amet, illum definitiones no quo,
                    <br>maluisset concludaturque et eum, <br>altera fabulas ut quo. Atqui causae gloriatur ius te,<br>
                    id agam omnis evertitur eum. Affert laboramus repudiandae nec et. <br>Inciderint efficiantur his ad.
                    Eum no molestiae voluptatibus.
                </p>
            </div>

        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/popper.js"></script>
    <script src="../assets/bootstrap/js/sidebars.js"></script>
</body>

</html>