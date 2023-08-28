<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

// Replace contact@example.com with your real receiving email address
// $receiving_email_address = 'fabien.rousset@icloud.com';

// if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
//   include( $php_email_form );
// } else {
//   die( 'Unable to load the "PHP Email Form" Library!');
// }

// $contact = new PHP_Email_Form;
// $contact->ajax = true;



// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

// $contact->add_message( $_POST['name'], 'From');
// $contact->add_message( $_POST['email'], 'Email');
// $contact->add_message( $_POST['message'], 'Message', 10);

// echo $contact->send();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];
  $contact->subject = $_POST['message'];

  $mail = new PHPMailer(true);

try {
  // Tentative de création d’une nouvelle instance de la classe PHPMailer
  $mail = new PHPMailer(true);
  // (…)
} catch (Exception $e) {
  echo "Mailer Error: " . $mail->ErrorInfo;
}
// Authentification via SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
// Informations personnelles CONNEXION
$mail->Host = "smtp.fabien-rousset.fr";
$mail->Port = "587";
$mail->Username = "contact@fabien-rousset.fr";
$mail->Password = "r8jnzLH.%JCtXy8";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

$mail->setFrom('contact@fabien-rousset.fr', 'nom');

$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->isHTML(true);




$mail->send();
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}

?>
