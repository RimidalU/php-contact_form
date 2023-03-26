    <?php

    session_start();

    require './phpMailer/PHPMailer.php';
    require './phpMailer/SMTP.php';
    require './phpMailer/Exception.php';

    $env = parse_ini_file('../.env');
    $mailServerSMTP = $env["MAIL_SERVER"];

    $mailServerLogin = $env["MAIL_SERVER_LOGIN"];
    $mailServerPassword = $env["MAIL_SERVER_PASSWORD"];
    $emailRecipient = $env["MAIL_RECIPIENT"];

    //User data
    $user = $_SESSION['currentUser'];

    $name = $user['name'];
    $email = $user['email'];
    $country = $user['country'];
    $aboutMe = $user['aboutMe'];

    $subjectMessage = "New user <mark> $name </mark> from <i> $country </i> added! </p>";

    $title = "New user * $name * added!";

    $body = "
    <h2>$subjectMessage</h2>
    <hr/>
    <h3>Data from the client:</h3>
    <b>Name:</b> $name<br/>
    <b>Email:</b> $email<br/>
    <b>Country:</b> $country<br/>
    <b>User message:</b> $aboutMe<br/>
    ";

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = function ($str, $level) {
            $GLOBALS['status'][] = $str;
        };

        $mail->Host       = $mailServerSMTP;
        $mail->Username   = $mailServerLogin;
        $mail->Password   = $mailServerPassword;
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom($mailServerLogin, "PHP mail repeater from 'PHP-CONTACT-FORM'"); // Mail address and sender's name

        $mail->addAddress($emailRecipient);

        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $body;

        // Debag
        if ($mail->send()) {
            $result = "success";
        } else {
            $result = "error";
        }
    } catch (Exception $e) {
        $result = "error";
        $status = "The message was not sent. Reason for the error: {$mail->ErrorInfo}";
    }

    // echo '<pre>';
    // echo json_encode(["result" => $result, "status" => $status]);
    // echo '</pre>';


    $_SESSION['checkPassMessage'] = 'Form data submitted successfully! <br/> You can go to the table page or enter new data';
    $_SESSION['alertClass'] = 'alert-success';

    header('Location: /');
