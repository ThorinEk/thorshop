<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="utf8">
<title>ICA Adminpanel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron">
  <h1 class="display-4">Nordpost Adminpanel</h1>
  <p class="lead">Skicka aviseringar till kunden snabbt och smidigt.</p>
  <hr class="my-4">
  <p>Utvecklad av Thorin</p>
</div>

<?php

$telefonNummer = $_POST["telefonNummer"];
$landskod = $_POST["landskod"];
$meddelande = $_POST["meddelande"];
$stad = $_POST["cityName"];

if ($meddelande == "standard"){
    $txt = "Paket finns att hämta på ombudet i " . $stad;
}
if ($meddelande == "LDH_onTheWay"){
  $meddelande = "Paketet är på väg med LDH Express. Levereras till din tomt i " . $stad;
}
if ($meddelande == "LDH_delivered"){
  $meddelande = "Paket från LDH Express levererat. Finns på din tomt i " . $stad;
}
if ($meddelande == "LDH_trackingCode"){
  $meddelande = "Paket är på väg med LDH Express. Spåra på vår hemsida. Kolli ID: " . $stad;
}

$telefonNummer = substr($telefonNummer,1);
$telefonNummer = $landskod . $telefonNummer;
$to = $telefonNummer . "@email.smsglobal.com";
$subject = "My subject";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>
<div class="container">
<h1 class="display-1">Grattis</h1>
<p>Om allt nu gått som det ska så har kunden fått en avisering</p>
<a class="btn btn-primary" href="adminpanel.php" role="button">Tillbaka</a>
<br>
<br>
<?php
    echo "<p>Mejlet skickas till: " . $to . "</p>";
    echo "<p>Texten blev: " . $txt . "</p>";
?>

</div>
</body>
</html>