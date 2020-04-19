<!DOCTYPE html>
<html lang="sv">
<title>Thorshop</title>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Thorshop - prisvärda råvaror med hög kvalitet">
  <meta name="keywords" content="Nordatlas, svensk minecraft, test">
  <meta name="author" content="Thorshop">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Reloader - Ta bort innan publicering-->
  <!--<meta http-equiv="refresh" content="10">-->
  <!--CSS Stilmall-->
  <link rel="stylesheet" type="text/css" href='style/style.css'>
  <link rel="stylesheet" type="text/css" href='style/mobile.css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="MainMenu">
        <div class="wrapper">
        <span class="logoContainer">
            <a href="./index.php">
                <img class="sitelogo" src="./img/ica.jpg">
            </a>
        </span>
            <ul>
                <li><a href="./index#chark">Chark</a></li>
                <li><a href="./index#frukt">Frukt</a></li>
                <li><a href="./index#bageri">Bageri</a></li>
            </ul>
        </div>
    </div>

    <?php
    if (isset($_POST)) {
        $name = $_POST["mcName"];
        $city = $_POST["city"];

        $to = "aditro@nordatlas.se";
        $subject = "Ny order";
        $txt = '
        <html>
        <body>
        <img class="cart-image" src="https://i.imgur.com/vVg5a3d.png"/>
        <p>Fläskkött</p>
        <p>Pris: 38kr</p>
        </body>
        </html>
        ';
        $headers = "From: order@nordatlas.eu" . "\r\n";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to,$subject,$txt,$headers);
    }
    ?>

    <div class="wrapper main">

        <div class="confirmation-box">
            <?php
            echo "<h1>Tack för din beställning " . $name . "!</h1>";
            echo "<p>Våra medarbetare plockar just nu din beställning. Vi kommer att leverera den till <strong>" . $city . "</strong> med Nordpost. Vanligtvis sker leverans inom några timmar.</p>";
            ?>
        </div>

        <div class="pageBottom">
            <div class="bottom-container">
                <img class="sitelogo" src="./img/ica.jpg">
                <p><strong>Information</strong><br><a href="terms">Köpvillkor</a><br><a href="about">Så går det till</a></p>
                <p><strong>ICA Centrallager</strong><br>Torsvik<br>Logpoint South Sweden</p>
                <img class="siteLogo" src="./img/nordpost.png">
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</body>
</html>