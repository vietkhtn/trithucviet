<?php
    require_once '../controllers/signUpController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <script src="../assets/js/jquery.js"></script>
<script src="../assets/js/sign-up.js" defer></script>
    <title>Stack Over Flow</title>
</head>
<body>
    <div class="header">
        <a href="index.php">
            <img src="../assets/image/stackoverflow.png" class="img-logo"/>
        </a>

        <ol class=" grid">
            <li class="grid-cell">About</li>
            <li class="grid-cell">Products</li>
            <li class="grid-cell">For Teams</li>
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
            <button type="button" href="log-in.php" class="sign-in signup">Sign up</button>
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
        <div class="left-side">
            <img src="../assets/image/stackoverflow.png" alt="">
        </div>  
        <div class="right-side">
            <div class="error">
            <?php
                if (!empty($error)) {
                    echo $error;
                }
            ?>
            </div>
            <h1 style="color: #212121;">Create an account</h1>
            <h1 style="color: #212121; font-size:20px">It's free and always will be</h1>
            <form action="sign-up.php" method="post" name="user-sign-up">
                <div class="sign-up-form">
                    <div class="sign-up-name">
                        <input type="text" name="first-name" id="first-name" class="text-field" placeholder="First Name">
                        <input type="text" name="last-name" id="last-name" class="text-field" placeholder="Last Name">
                    </div>
                    <div class="sign-wrap-mobile">
                        <input type="text" name="email-mobile" id="email-mobile" class="text-input" placeholder="Mobile or Email">
                    </div>
                    <div class="sign-up-password">
                        <input type="password" name="up-password" id="up-password" class="text-input" placeholder="Password">
                    </div>
                    <div class="sign-up-birthday">
                        <div class="bday">Birthday</div>
                        <div class="form-birthday">
                            <select name="birth-day" id="days" class="select-body"></select>
                            <select name="birth-month" id="months" class="select-body"></select>
                            <select name="birth-year" id="years" class="select-body"></select>
                        </div>
                    </div>
                    <div class="gender-wrap">
                        <input type="radio" name="gender" id="fem" value="female" class="m0">
                        <label for="fem" class="gen">Female</label>
                        <input type="radio" name="gender" id="male" value="male" class="m0">
                        <label for="male" class="gen">Male</label>
                    </div>
                    <div class="term">
                        <input type="checkbox" name="EmailOptIn" id="EmailOptIn">                     
                        Opt-in to receive occasional product updates, user research invitations, company announcements, and digests.
                    </div>
                    <input type="submit" value="Sign Up" class="sign-up">
                </div>
            </form>
        </div>
    </div>
</body>
</html>