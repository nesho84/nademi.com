<?php

/**
 * Sending Emails Function
 * @param string $Subject - Subject of the form input
 * @param string $FromName - Name of the form input
 * @param string @FromEmail - User email input
 * @param string $Message - User message input
 * @param string $To - The email to be send to (application email)
 */
function sendEmail($Subject, $FromName, $FromEmail, $Message, $To, $CC = '', $BCC = '', $Attachments = '')
{
    $templateFile = TEMPLATES_PATH . '/email_contact.html';

    // Check if the template file exists
    if (file_exists($templateFile)) {
        $finalMailHTML = file_get_contents($templateFile);
    } else {
        die('Unable to locate the template file');
    }

    // Array keys to be replaced in the template file
    $replaceArr = [
        '{SUBJECT}' => $Subject,
        '{FROM_NAME}' => $FromName,
        '{MESSAGE}' => $Message,
        '{EMAIL_LOGO}' => APPURL . '/public/img/logo2.png',
        '{GOTOBTN_URL}' => APPURL . '/admin'
    ];

    // Search and replace all the replaceArr
    foreach (array_keys($replaceArr) as $key) {
        if (strlen($key) > 2 && trim($key) != '') {
            $finalMailHTML = str_replace($key, $replaceArr[$key], $finalMailHTML);
        }
    }

    // Prepare the email parts
    $mail             = new PHPMailer\PHPMailer\PHPMailer(true);
    //ggf Mailserver
    //$mail->Host = 'xxxxxxxxxxxxx';
    $mail->From       = $FromEmail;
    $mail->FromName   = utf8_decode($FromName);
    $mail->isHTML(true);
    $mail->Subject    = utf8_decode($Subject);
    $mail->Body       = utf8_decode($finalMailHTML);
    $mail->AltBody    = strip_tags(utf8_decode($finalMailHTML));
    $mail->AddAddress($To);
    $mail->AddReplyTo($FromEmail);

    // $mail->AddCC($CC);
    // $mail->AddBCC($BCC);
    // $mail->AddAttachment($Attachments);

    // Send email
    if (!$mail->Send()) {
        $GLOBALS['ok'] = false;
        $GLOBALS['error'] = "E-Mail can not be sent! " . $mail->ErrorInfo;

        echo json_encode($GLOBALS);
    }
}
