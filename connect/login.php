<?php

require_once 'DB.php';

class login {
    // Check Cookie if user already logged require_once
    public static function isLoggedIn() {
        if (isset($_COOKIE['FBID'])){
            // Check token user in user-token
            if (DB::query('SELECT user_id FROM token WHERE token = :token', array(':token' => sha1($_COOKIE['FBID'])))){
                // Get user_id
                $user_id = DB::query('SELECT user_id FROM token WHERE token = :token', array(':token' => sha1($_COOKIE['FBID'])))[0]['user_id'];
                return $user_id;
            }
        }
    }
}

?>