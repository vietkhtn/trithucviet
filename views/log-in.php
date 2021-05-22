<?php
    require_once '../controllers/logInController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    <title>Document</title>
</head>
<body>
<div class="header">
        <a href="index.php">
            <img src="../assets/image/stackoverflow.png" class="img-logo"/>
        </a>

        <ol class=" grid">
            <li class="grid-cell"><a class="top-bar-menu" href="about.php">About</a></li>
            <li class="grid-cell"><a class="top-bar-menu" href="products.php">Products</a></li>
            <li class="grid-cell"><a class="top-bar-menu" href="forTeams.php">For Teams</a></li>
        </ol>

        <div class="searchForm">
            <label clas="name-label">
                <svg class="icon icon-user">
                    <use xlink:href="#icon-user"></use>
                </svg>
                <input type="text" name="searchQuestion" id="searchQuestion" class="search-text-field" placeholder="Search...">
            </label>

            <svg class="spritesheet">
                <symbol id="icon-user" viewBox="0 0 32 32">
                    <title>user</title>
                    <path d="M18 16.5l-5.14-5.18h-.35a7 7 0 10-1.19 1.19v.35L16.5 18l1.5-1.5zM12 7A5 5 0 112 7a5 5 0 0110 0z"></path>
                </symbol>
            </svg>
        </div>
        <!-- SignUp Button -->
        <div class="signup-button">
            <a href="sign-up.php">
            <button type="button" href="sign-up.php" class="sign-in signup">Sign up</button>
            </a>
        </div>
        <!-- Login Button -->
        <div class="login-button">
            <a href="log-in.php">
            <button type="button" href="log-in.php" class="sign-in login">Log in</button>
            </a>
        </div>
    </div>  

    <div class="main">
         <div class="form-center">
                <form action="log-in.php" method="post" class="log-in-form-wrap">
                    <div class="logoSVG">
                        <a href="log-in.php">
                            <svg aria-hidden="true"  width="48" height="55.5" viewBox="0 0 32 37">
                                <path d="M26 33v-9h4v13H0V24h4v9h22z" fill="#BCBBBB"></path>
                                <path d="M21.5 0l-2.7 2 9.9 13.3 2.7-2L21.5 0zM26 18.4L13.3 7.8l2.1-2.5 12.7 10.6-2.1 2.5zM9.1 15.2l15 7 1.4-3-15-7-1.4 3zm14 10.79l.68-2.95-16.1-3.35L7 23l16.1 2.99zM23 30H7v-3h16v3z" fill="#F48024"></path>
                            </svg> 
                        </a>
                    </div>

                    <div class="log-in-form">
                         <!-- Email or mobile -->
                        <div class="email-mobile-input">
                            <div class="input-text">Email or Mobile</div>
                            <input type="text" name="in-email-mobile" id="email-mobile" class="text-field">
                        </div>
                        <!-- Password -->
                        <div class="password-input">
                            <div class="input-text">Password</div>
                            <input type="password" name="in-pass" id="email-password" class="text-field">
                        </div>
                        <!-- Error Message -->
                        <div class="error">
                            <?php
                                if (!empty($error)) {
                                    echo $error;
                                }
                            ?>
                        </div>
                        <!-- Login Button -->
                        <div class="login-button">
                            <input type="submit" value="Log in" class="loginButton">
                        </div>
                        <!-- Forgotten Account -->
                        <div class="forgotten-acc">Forgotten account ?</div>
                    </div>
                </form>
        </div>
    </div>

</body>
</html>