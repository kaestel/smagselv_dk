<!DOCTYPE html>
<html lang="DA">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> =||| www.smagselv.dk |||= </title>
	<link rel="stylesheet" type="text/css" href="/css/style_red.css" />
</head>

<body>

<table cellpadding="0" cellspacing="0" border="0" width="550">
<tr>
	<td colspan="2"><img src="img/dot_trans.gif" width="1" height="20" /></td>
</tr>
<tr>
	<td><img src="img/dot_trans.gif" width="65" height="1" /></td>
	<td><img src="img/logo.gif" width="371" height="117" /></td>
</tr>
<tr>
	<td colspan="2"><img src="img/dot_trans.gif" width="1" height="5" /></td>
</tr>
<tr>
	<form action="send.php" method="post" name="form">
	<input type="hidden" name="what" value="kursus" />
	<td><img src="img/dot_trans.gif" width="65" height="1" /></td>
	<td>Hvis du er interesseret i information om et Smag Selv kursus kan du sende mig en mail via nedenst&aring;ende formular
	og jeg kontakter dig hurtigst.
	<br /><br /><br />
<?php
error_reporting(0);
$message = $_GET["message"];

$navn = $_GET["navn"];
$adresse1 = $_GET["adresse1"];
$adresse2 = $_GET["adresse2"];
$postnr = $_GET["postnr"];
$by = $_GET["by"];
$email = $_GET["email"];
$telefon = $_GET["telefon"];


if($message != ""){
	PRINT $message."<br /><br />";
}
?>
	Navn:<br />
	<input type="text" name="navn" style="width:400px;" value="<?php PRINT $navn; ?>" />
	<br /><br />
	Adresse:<br />
	<input type="text" name="adresse1" style="width:400px;" value="<?php PRINT $adresse1; ?>" />
	<input type="text" name="adresse2" style="width:400px;" value="<?php PRINT $adresse2; ?>" />
	<br /><br />
	Postnr og by:<br />
	<input type="text" name="postnr" style="width:50px;" value="<?php PRINT $postnr; ?>" />&nbsp;<input type="text" name="by" style="width:345px;" value="<?php PRINT $by; ?>" />
	<br /><br />
	Email:<br />
	<input type="text" name="email" style="width:400px;" value="<?php PRINT $email; ?>" />
	<br /><br />
	Telefon:<br />
	<input type="text" name="telefon" style="width:400px;" value="<?php PRINT $telefon; ?>" />
	<br /><br />
	<a href="javascript:document.form.submit();">send</a>&nbsp;&nbsp;<a href="index.php">fortryd</a>
	</td>
	</form>
</tr>

<tr>
	<td colspan="2"><img src="img/dot_trans.gif" width="1" height="30" /></td>
</tr>
</table>
