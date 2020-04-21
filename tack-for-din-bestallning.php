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
        $shopping_list = $_POST["shopping_list"];
        $sum = 0;
        //$shopping_list = "0,Torsk,36,3,https://i.imgur.com/TVwd2Qi.png, 1,Söta bär,76,4,https://i.imgur.com/lz3mEcb.png, 2,Morot,96,4,https://i.imgur.com/UA4kV37.png,";
        $item_rows = explode(", ", $shopping_list);
        for ($i = 0; $i < count($item_rows); $i++){
            $values = explode(",", $item_rows[$i]);
            $ID[$i] = $values[0];
            $Product_Name[$i] = $values[1];
            $Price[$i] = $values[2];
            $Quantity[$i] = $values[3];
            $Image_link[$i] = $values[4];
        }
        for ($x = 0; $x < count($Price); $x++){
            $sum += $Price[$x];
        }
        $table = " ";
        for ($i = 0; $i < count($item_rows); $i++){
            $table .= '<tr style="border:1px solid black;"><td style="border:1px solid black; padding:10px">' . $ID[$i] . '</td><td style="border:1px solid black; padding:10px">' . $Product_Name[$i] . '</td><td style="border:1px solid black; padding:10px">' . $Price[$i] . '</td><td style="border:1px solid black; padding:10px">' . $Quantity[$i] . '</td><td style="text-align:center; padding:10px"><img src="' . $Image_link[$i] . '" style="width:50px; height:50px;"></td></tr>';
        }
        $name = $_POST["mcName"];
        $city = $_POST["city"];
        $to = "aditro@nordatlas.se";
        $subject = 'Ny order från ' . $name;
        $txt = '
        <html>
        <body>
        <h1>Plocksedel ICA</h1>
        <h3>Beställare: ' . $name . '</h3>
        <h3>Stad: ' . $city . '</h3>
        <h3>Att debitera kunden: ' . $sum . ' SEK</h3> 
        <table style="border-collapse:collapse; font-family:Verdana, Arial; font-size:1.3em;">
        <thead style="border:1px solid black;"><th style="border:1px solid black; padding:20px;">ID</th><th style="border:1px solid black; padding:20px;">Namn</th><th style="border:1px solid black; padding:20px;">Pris</th><th style="border:1px solid black; padding:20px;">Kvantitet</th><th style="border:1px solid black; padding:20px;">Bildlänk</th></thead>
        ' . $table . '
        </table>
        <h3>Kommando: /fe deduct ' . $name . ' ' . $sum . '</h3>
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
            <button class="show-purchases">Visa orderlista</button>
            <br>
            <table style="font-family:Verdana">
                <thead><th>ID</th><th>Namn</th><th>Pris</th><th>Kvantitet</th><th>Bildlänk</th></thead>
            <?php
            for ($i = 0; $i < count($item_rows); $i++){
                echo '<tr> <td>' . $ID[$i] . '</td><td>' . $Product_Name[$i] . '</td><td>' . $Price[$i] . '</td><td>' . $Quantity[$i] . '</td><td style="text-align:center;"><img src="' . $Image_link[$i] . '" style="width:50px; height:50px;"></td></tr>';
            }
            echo '<p>' . $sum . '</p>';
            ?>
            </table>
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
<!--<script src="script/script.js"></script>-->
</body>
</html>