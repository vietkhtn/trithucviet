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
            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light" style="padding: 0rem;">
                <div class="container-fluid" style="justify-content: flex-start; padding-right: 0rem;padding-left: 0rem;">
                    <div class="col-md-auto">
                        <a class="navbar-brand" href="#">
                            <img src="../assets/image/stackoverflow.png" width="200" height="" class="d-inline-block align-top" alt="">
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button style="/* background-color: lightslategray; */border: none;color: dimgray;padding: 11px;text-align: center;/* text-decoration: none; */display: inline-block;font-size: 14px;margin: 1px px;border-radius: 34px;font-weight: 700;width: 78px;">
                            About
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button style="/* background-color: lightslategray; */border: none;color: dimgray;padding: 11px;text-align: center;/* text-decoration: none; */display: inline-block;font-size: 14px;margin: 1px px;border-radius: 34px;font-weight: 700;width: 85px;">
                            Products
                        </button>
                    </div>
                    <div class="col-md-1" style="padding-right: 8.4rem;">
                        <button style="/* background-color: lightslategray; */border: none;color: dimgray;padding: 11px;text-align: center;/* text-decoration: none; */display: inline-block;font-size: 14px;margin: 1px px;border-radius: 34px;font-weight: 700;width: 100px;">
                            For Teams
                        </button>
                    </div>
                    <div class="col-md-5">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                            <button type="submit" style="border: none;color: dimgray;padding: 6px;text-align: center;/* text-decoration: none; */display: inline-block;border-radius: 34px;width: 50px;">
                                <span class="material-icons">search</span></button>
                        </form>
                    </div>
                    <div class="col-md-auto" style="padding-left: 2rem;">
                        <button type="button" class="btn btn-outline-primary" style="background-color: #DEECF6;">Log in</button>
                    </div>
                    <div class="col-md-auto" style="padding-left: 0.2rem;">
                        <button type="button" class="btn btn-primary" style="background-color: #52A3DC;">Sign up</button>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-3">
                <!--======================== sidebar====================================================================== -->
                <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <svg class="bi me-2" width="30" height="24">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                        <span class="fs-5 fw-semibold">Collapsible</span>
                    </a>
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                Home
                            </button>
                            <div class="collapse show" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-dark rounded">Overview</a></li>
                                    <li><a href="#" class="link-dark rounded">Updates</a></li>
                                    <li><a href="#" class="link-dark rounded">Reports</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                                Dashboard
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-dark rounded">Overview</a></li>
                                    <li><a href="#" class="link-dark rounded">Weekly</a></li>
                                    <li><a href="#" class="link-dark rounded">Monthly</a></li>
                                    <li><a href="#" class="link-dark rounded">Annually</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                Orders
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-dark rounded">New</a></li>
                                    <li><a href="#" class="link-dark rounded">Processed</a></li>
                                    <li><a href="#" class="link-dark rounded">Shipped</a></li>
                                    <li><a href="#" class="link-dark rounded">Returned</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                Account
                            </button>
                            <div class="collapse" id="account-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-dark rounded">New...</a></li>
                                    <li><a href="#" class="link-dark rounded">Profile</a></li>
                                    <li><a href="#" class="link-dark rounded">Settings</a></li>
                                    <li><a href="#" class="link-dark rounded">Sign out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--======================== sidebar END====================================================================== -->
            </div>
        </div>


    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/popper.js"></script>
    <script src="../assets/bootstrap/js/sidebars.js"></script>
</body>

</html>