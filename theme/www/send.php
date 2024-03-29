<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(0);
include("../config/connect_mail.php");

$what = $_POST["what"];

$navn = $_POST["navn"];
$adresse1 = $_POST["adresse1"];
$adresse2 = $_POST["adresse2"];
$postnr = $_POST["postnr"];
$by = $_POST["by"];
$email = $_POST["email"];
$telefon = $_POST["telefon"];

if($what == "bestil"){
	$title = "Bogbestilling";
}else{
	$title = "Kursus information";
}

if( $what == "bestil" || $what == "kursus") {
	if($navn == ""){
		header("Location: $what.php?navn=$navn&adresse1=$adresse1&adresse2=$adresse2&postnr=$postnr&by=$by&email=$email&telefon=$telefon&message=Det er en fejl i det indtastede");
		exit();
	}else{
		if(($adresse1 != "" && $postnr != "" && $by != "") || ($email != "") ||($telefon != "")){



			require 'php/Exception.php';
			require 'php/PHPMailer.php';
			require 'php/SMTP.php';

			//$result = mail("per@kaestel.dk", $title, "$title\n\n$navn\n$adresse1\n$adresse2\n$postnr $by\n\n$email\n$telefon");

			// include("php/class.phpmailer.php");

			$mail             = new PHPMailer();
			$mail->Subject    = $title;

			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)

			$mail->CharSet    = "UTF-8";
			$mail->IsSMTP();

			$mail->SMTPAuth   = true;
			$mail->SMTPSecure = "tls";
			$mail->Host       = "smtp.gmail.com";
			$mail->Port       = 587;

			$mail->Username   = MAIL_USER;
			$mail->Password   = MAIL_PASS;

			$mail->SetFrom('mailer@kaestel.dk', 'Kæstel Postmaster');
			$mail->AddAddress("martin@think.dk");
			$mail->AddAddress("per@kaestel.dk");

			$mail->Body = "$title\n\n$navn\n$adresse1\n$adresse2\n$postnr $by\n\n$email\n$telefon";
			//$mail->MsgHTML($message);

			$test = $mail->Send();

			if($test) {
				$result = 1;
			}
			else {
				$result = 0;
			}

		}else{
			header("Location: $what.php?navn=$navn&adresse1=$adresse1&adresse2=$adresse2&postnr=$postnr&by=$by&email=$email&telefon=$telefon&message=Det er en fejl i det indtastede");
			exit();
		}
	}
	if($result != 1){
		header("Location: $what.php?navn=$navn&adresse1=$adresse1&adresse2=$adresse2&postnr=$postnr&by=$by&email=$email&telefon=$telefon&message=Det er en fejl i det indtastede");
		exit();
	}
}

header("Location: tak.php?what=$what");
?>