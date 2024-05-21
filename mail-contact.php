<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name = $_POST['name'] ?? 'No name provided';
$radio_group = $_POST['radio-group'] ?? 'No radio group provided';
$guest = $_POST['guest'] ?? 'No guest provided';
$reason = $_POST['reason'] ?? 'No reason provided';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host       = 'mail.mahas.my.id';
$mail->SMTPAuth   = true;
$mail->Username   = 'service@mahas.my.id';
$mail->Password   = 'd20Y9DtePz6=';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

// Recipients
$mail->setFrom('service@mahas.my.id', 'Mahas');
$mail->addAddress('ngurah.np34@gmail.com', 'Ngurah');

// Content
$mail->isHTML(true);
$mail->Subject = 'Wedding Invitation';
$mail->Body    = "
	<h2>Contact Form Submission</h2>
	<p><strong>Name:</strong> $name</p>
	<p><strong>Come:</strong> $radio_group</p>
	<p><strong>Guest:</strong> $guest</p>
	<p><strong>Note:</strong> $reason</p>
";
$mail->AltBody = "
	Contact Form Submission\n
	Name: $name\n
	Come: $radio_group\n
	Guest: $guest\n
	Reason: $reason
";

$mail->send();
echo 'Message has been sent';
?>
