<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function returnError($event) {
        $return = [];

        switch($event) {
            case 'ILVUSR': # No user found or invalid password
                $return['code'] = 404;
                $return['errorcode'] = "ILVUSR";
                $return['message'] = "Email or password invalid. Please try again";
                break;
            case 'IVLDDTA': # Data missing
                $return['code'] = 404;
                $return['errorcode'] = "IVLDDTA";
                $return['message'] = "Please fill all required fields before continuing.";
                break;
            case 'USRNKOWN': # Email already being used.
                $return['code'] = 404;
                $return['errorcode'] = "USRNKOWN";
                $return['message'] = "This email is already being used by an other user. Please try again.";
                break;
            case 'PASSNTSAME': # Password not the same
                $return['code'] = 404;
                $return['errorcode'] = "PASSNTSAME";
                $return['message'] = "Make sure you use the same password!";
                break;
            default:       # Unknown error found.
                $return['code'] = 404;
                $return['errorcode'] = "UKWNERR";
                $return['message'] = "An unknown error occurred. Please try again later.";
                break;
        }

        return $return;
    }
/**
 * Function SendMail();
 * Send an Email to a user.
 * If Empty, returns an error.
 * 
 * @param string $email "A valid Email adres"
 * @param string $username "A Username or other thing related. Will be used as name!"
 * @param array $cc "Attach multiple emails if more are present. leave empty array to not include."
 * @param string $mailfile "A HTML document that will be send as the email. Base Directory: /assets/mails/*. You do not have to include /assets/mails in the message. Returns error if file has not been found."
 * @param string $content "Adds extra variables in the mail! Must be added like this: ${YOURARRAY}[{'name'}] = {VALUE}. Add in the mail like this: {{NAME}} full caps."
 * @return "An email to an user."
 */
function sendMail(string $email, string $username, array $cc = [], string $mailfile, string $mailtitle, array $content = [])
{
  $mail = new PHPMailer(true);
  try {
    // Basis
    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USER'];
    $mail->Password = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $_ENV['MAIL_PORT'];
    // Information
    $mail->setFrom($_ENV['MAIL_USER'], 'Zerdardian Mailer');

    // Check if mail isn't empty
    if (empty($email)) {
      $return['error'] = 404;
      $return['type'] = 'MAILERR';
      $return['message'] = 'Please enter a valid email adres';
      return $return;
    } else {
      if (empty($username)) {
        $username = 'User';
      }
      $mail->addAddress($email, $username);
    }

    // Check if cc was added.
    if (!empty($cc)) {
      foreach ($cc as $email) {
        $mail->addCC($email);
      }
    }

    // Check for the mail file
    if (file_exists('./assets/mails/' . $mailfile)) {
      $body = file_get_contents('./assets/mails/' . $mailfile);
      $body = str_replace("{{USERNAME}}", $username, $body);
      if (!empty($content)) {
        foreach ($content as $key => $value) {
          $capkey = strtoupper($key);
          $body = str_replace("{{" . $capkey . "}}", $value, $body);
        }
      }

      // Time to send!

      $mail->isHTML(true);
      $mail->Subject = $mailtitle;
      $mail->Body = $body;
      if ($mail->send()) {
        $return['error'] = 200;
        $return['type'] = null;
        $return['message'] = null;
        return $return;
      }
    } else {
      $return['error'] = 404;
      $return['type'] = 'MAILERR';
      $return['message'] = 'File was not found, please try again!';
      return $return;
    }
  } catch (Exception $e) {
    $return['error'] = 404;
    $return['type'] = 'MAILERR';
    $return['message'] = $mail->ErrorInfo;
    return $return;
  }
}
?>