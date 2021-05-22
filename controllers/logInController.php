<?php

require_once '../core/load.php';
require_once '../messages/message.php';
require_once '../connect/DB.php';

if (isset($_POST['in-email-mobile']) && !empty($_POST['in-email-mobile'])){
    $emailOrMobile = $_POST['in-email-mobile'];
    $password = $_POST['in-pass'];
    
    if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $emailOrMobile)) { // use regex regexr.com
        if (!preg_match("^[0-9]{10}^", $emailOrMobile)) {
            $error = MESSAGE::emailOrMobileNotCorrect;
        }else { // If user type mobile
            if(DB::query("SELECT mobile from users WHERE mobile = :mobile", array('mobile' => $emailOrMobile))){
                // Check password hash
                if (password_verify($password, DB::query("SELECT password from users WHERE mobile = :mobile", array(':mobile' => $emailOrMobile))[0]['password'])){
                    // Get user_id
                    $user_id = DB::query("SELECT user_id from users WHERE mobile = :mobile", array(':mobile' => $emailOrMobile))[0]['user_id'];

                    $tstrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
                    $loadFromUser->create('token', array('token' => sha1($token), 'user_id' => $user_id));
                    $userLink = $loadFromUser->userLinkByUserId($user_id);
                    // Set user cookie
                    setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
                    // redirect to user page
                    $VIEW = "../views/profile.php";
                    header ("Location: ../template/master-layout.php?username=$userLink");
                }else{ // Wrong password
                    $error = MESSAGE::wrongPassword;
                }
            }else{
                $error = MESSAGE::userNotExistInDatabase;
            }
        }
    }else { // If user type email
        // Check user email exist in DB
        if(DB::query("SELECT email from users WHERE email = :email", array('email' => $emailOrMobile))){
            // Check password hash
            if (password_verify($password, DB::query("SELECT password from users WHERE email = :email", array(':email' => $emailOrMobile))[0]['password'])){
                // Get user_id
                $user_id = DB::query("SELECT user_id from users WHERE email = :email", array(':email' => $emailOrMobile))[0]['user_id'];
                $tstrong = true;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
                $loadFromUser->create('token', array('token' => sha1($token), 'user_id' => $user_id));

                $userLink = $loadFromUser->userLinkByUserId($user_id);
                // Set user cookie
                setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
                // redirect to user page
                $VIEW = "../views/profile.php";
                header ("Location: ../template/master-layout.php?username=$userLink");
            }else{ // Wrong password
                $error = MESSAGE::wrongPassword;
            }
        }else{ // user not in database
            $error = MESSAGE::userNotExistInDatabase;
        }
    }
}
?>