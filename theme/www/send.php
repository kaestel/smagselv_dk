<?php
error_reporting(0);
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
	$title = "Kursus information &oslash;nskes";
}

if( $what == "bestil" || $what == "kursus") {
	if($navn == ""){
		header("Location: $what.php?navn=$navn&adresse1=$adresse1&adresse2=$adresse2&postnr=$postnr&by=$by&email=$email&telefon=$telefon&message=Det er en fejl i det indtastede");
		exit();
	}else{
		if(($adresse1 != "" && $postnr != "" && $by != "") || ($email != "") ||($telefon != "")){


			//$result = mail("per@kaestel.dk", $title, "$title\n\n$navn\n$adresse1\n$adresse2\n$postnr $by\n\n$email\n$telefon");

			include("php/class.phpmailer.php");

			$mail             = new PHPMailer();
			$mail->Subject    = $title;

			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)

			$mail->CharSet    = "UTF-8";
			$mail->IsSMTP();

			$mail->SMTPAuth   = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host       = "smtp.gmail.com";
			$mail->Port       = 465;
			$mail->Username   = "mailer@think.dk";
			$mail->Password   = "mi8y6td";

			$mail->SetFrom('mailer@think.dk', 'Think Postmaster');
			$mail->AddAddress("martin@think.dk");
			$mail->AddAddress("per@kaestel.dk");

			$mail->Body = "$title\n\n$navn\n$adresse1\n$adresse2\n$postnr $by\n\n$email\n$telefon";
			//$mail->MsgHTML($message);

			if($mail->Send()) {
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