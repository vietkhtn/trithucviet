<?php 

require '../core/load.php';
require '../messages/message.php';
require '../connect/DB.php';

if (isset($_POST['first-name']) && !empty($_POST['first-name'])) {
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $emailOrMobile = $_POST['email-mobile'];
        $password = $_POST['up-password'];
        $birthDay = $_POST['birth-day'];
        $birthMonth = $_POST['birth-month'];
        $birthYear = $_POST['birth-year'];
        // Check if empty gen
        if (!empty($_POST['gender'])) {
            $gender = $_POST['gender'];
        }

        $birthDate = ''.$birthYear.'-'.$birthMonth.'-'.$birthDay.'';

        if (empty($firstName) or empty($lastName) or empty($emailOrMobile) or empty($password) or empty($gender)){
            $error = MESSAGE::allFieldsRequired;
        }else {
            $first_name = $loadFromUser->checkInput($firstName);
            $last_name = $loadFromUser->checkInput($lastName);
            $emailOrMobile = $loadFromUser->checkInput($emailOrMobile);
            $password = $loadFromUser->checkInput($password);
            $screenName = ''.$first_name.'_'.$last_name.'';
            // Check if screenName is exist in DB, userLink -> screenName with random number, if not exist -> userLink is screenName
            if (DB::query("SELECT screen_name FROM users WHERE screen_name = :screenName", array(':screenName' => $screenName))) {
                $screenRand = rand();
                $userLink = ''.$screenName.''.$screenRand.'';
            }else{
                $userLink = $screenName;
            }

            // Check email or mobile phone format
            if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $emailOrMobile)) { // use regex regexr.com
                if (!preg_match("^[0-9]{10}^", $emailOrMobile)) {
                    $error = MESSAGE::emailOrMobileNotCorrect;
                }else { // User type mobile number
                    $mobileLen = strlen((string)$emailOrMobile);
                    if ($mobileLen < 10 || $mobileLen > 10) {
                        $error = MESSAGE::limitMobileLen;
                    }else if(strlen($first_name) > 20){ // check name too short
                        $error = MESSAGE::limitNameLen;
                    }else if (strlen($password) < 5 || strlen($password) > 60){ // check password too short or too long
                        $error = MESSAGE::limitPasswordLen;
                    }else { // Check if email already exist
                        if($loadFromUser->checkMobile($emailOrMobile) === true){
                            $error = MESSAGE::mobileAlreadyExists;
                        }else{
                            // Insert user in db
                            $user_id = $loadFromUser->create('users', array('first_name' => $first_name, 'last_name' => $last_name, 
                                                            'mobile' => $emailOrMobile, 'password' => password_hash($password, PASSWORD_BCRYPT), 
                                                            'screen_name'=> $screenName , 'userLink' => $userLink, 'birthday' => $birthDate, 'gender' => $gender));
    
                            // Create Profile user
                            $loadFromUser->create('profile', array('user_id'=> $user_id, 'first_name' => $first_name, 'last_name' => $last_name, 'birthday' => $birthDate, 'gender' => $gender,
                                                                    'profilePic' => '../assets/image/defaultProfilePic.png', 'coverPic' => '../assets/image/defaultCoverPic.png'));
                            
                            // Create token for user
                            $tstrong = true;
                            $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
                            $loadFromUser->create('token', array('token' => sha1($token), 'user_id' => $user_id));
    
                            // Set user cookie
                            setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
                            // redirect to homepage
                            header('Location: log-in.php');
                        }
                    }
                }
            }else { // User type email
                if (!filter_var($emailOrMobile)){ // check if email not correct format
                    $error= MESSAGE::invalidEmailFormat;
                }else if(strlen($first_name) > 20){ // check name too short
                    $error = MESSAGE::limitNameLen;
                }else if (strlen($password) < 5 || strlen($password) > 60){ // check password too short or too long
                    $error = MESSAGE::limitPasswordLen;
                }else { // Check if email already exist
                    if(filter_var($emailOrMobile, FILTER_VALIDATE_EMAIL) && $loadFromUser->checkEmail($emailOrMobile) === true){
                        $error = MESSAGE::emailAlreadyExists;
                    }else{
                        // Insert user in db
                        $user_id = $loadFromUser->create('users', array('first_name' => $first_name, 'last_name' => $last_name, 
                                                        'email' => $emailOrMobile, 'password' => password_hash($password, PASSWORD_BCRYPT), 
                                                        'screen_name'=> $screenName , 'userLink' => $userLink, 'birthday' => $birthDate, 'gender' => $gender));

                        // Create Profile user
                        $loadFromUser->create('profile', array('user_id'=> $user_id, 'firstName' => $first_name, 'lastName' => $last_name, 'birthday' => $birthDate, 'gender' => $gender,
                        'profilePic' => '../assets/image/defaultProfile.png', 'coverPic' => '../assets/image/defaultCover.png'));

                        // Create token for user
                        $tstrong = true;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $tstrong));
                        $loadFromUser->create('token', array('token' => sha1($token), 'user_id' => $user_id));

                        // Set user cookie
                        setcookie('FBID', $token, time()+60*60*24*7, '/', NULL, NULL, true);
                        // redirect to homepage
                        header('Location: log-in.php');
                    }
                }
            }
        }
    }
?>