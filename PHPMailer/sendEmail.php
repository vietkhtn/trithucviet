<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    function sendMail($email,$title, $content, $type) {

        $mail = new PHPMailer();

        //smtp settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "stackoverflow.v2@gmail.com";
        $mail->Password = "12345Abc";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //email settings
        $mail->setFrom('stackoverflow.v2@gmail.com', 'Stackoverflow_Fake_version');
        $mail->addAddress($email);

        $mail->isHTML(true);   

        //-------------------------------set Subject and Content Mail----------------------------
        if ($type == "question") {
            $stringSubject = 'Your post has been approved';
            $stringContent = "Your post with the title <b>{$title}</b>  has been approved! <br> <h3>Content:</h3><br> {$content}";
        }
        if ($type == "answer") {
            $stringSubject = 'Your post has been approved';
            $stringContent = "Your post with the title <b>{$title}</b>  has been approved! <br> <h3>Content:</h3><br> {$content}";
        }
        //----------------------------------------------------------------------------------------------------

        $mail->Subject = $stringSubject;   
        $mail->Body = $stringContent;

        if ($mail->send()) {
            $response = "Email is send!";
        }
        else {
            $response = "Something is wrong!";
        }
    }
    


?>