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
            <a>
                <img class="sitelogo" src="./img/ica.jpg">
            </a>
        </span>
            <ul>
                <li><a href="#chark">Chark</a></li>
                <li><a href="#frukt">Frukt</a></li>
                <li><a href="#bageri">Bageri</a></li>
            </ul>
        </div>
    </div>
    <div class="MainMenu second">
        <div class="wrapper">
            <div class="text-container">
                <p><i class="fa fa-truck"></i>Handla närproducerade varor som levereras genom Nordpost.</p>
            </div>
            <div class="cart-container">
                <button class="view-cart"><i class="fa fa-shopping-cart"></i>Kundvagn</button>
            </div>
        </div>
    </div>
    <div class="cart-window">
        <div class="cart-window-container" id="cart-window-container">
            <div class="cart-summary">
                <h2>Att betala</h2><h2 class="cart-total">0</h2>
            </div>
        </div>
        <div class="cart-footer">
            <form method="post" action="./tack-for-din-bestallning.php">
                <h3>Beställ varor i kundvagnen</h3>
                <label for="mcName">Ditt Minecraftnamn</label>
                <br>
                <input type="text" class="form-control" placeholder="Ditt exakta namn i Minecraft" id="mcName" name="mcName" required>
                <br>
                <label for="city">Din stad på Nordatlas</label>
                <br>
                <input type="text" class="form-control" placeholder="Ange staden du bor i" id="city" name="city" required>
                <button type="submit" class="send-order">Bekräfta köp</button>
            </form>
        </div>
    </div>
<div class="wrapper main">
    <a class="anchor" id="chark"></a>
    <h1>Chark</h1>
    <p>Saftig biff, fågel eller fina fisken. Här kan du handla allt för din gryta, gratäng och grillat.</p>   
    <div class="grid-container chark">
    <?php
    $filename = 'database/chark.csv';
    $the_big_array = []; 
    if (($h = fopen("{$filename}", "r")) !== FALSE) 
    {
    while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
    {
        $the_big_array[] = $data;		
    }
    fclose($h);
    }
    for ($i = 2; $i < count($the_big_array); $i++){ ?>
        <div class="grid-item">
            <div class="grid-img-container chark">
                <img class="image-link" src="<?php echo $the_big_array[$i][3]; ?>">
            </div>
            <h3 class="title"><?php echo $the_big_array[$i][1]; ?></h3>
            <div class="grid-text-container">
                <p class="price"><?php echo $the_big_array[$i][2]; ?></p><p class="unit">kr</p>
            </div>
            <div class="number">
                <span class="minus">-</span>
                <input class="quantity" type="text" value="0"/>
                <span class="plus">+</span>
            </div>
            <div class="btn_container">
                <button class="add_to_cart">Lägg i kundvagnen</button>
            </div>
        </div>
    <?php } ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="frukt"></a>
    <h1>Frukt</h1>
    <p>Här hittar du alltid färsk frukt att fylla upp fruktkorgen med. Goda äpplen, apelsiner och bananer blir en god fruktsallad eller varför inte en uppfriskande smoothie?</p>
    
    <div class="grid-container frukt">
    <?php
    $filename = 'database/frukt.csv';
    $the_big_array = []; 
    if (($h = fopen("{$filename}", "r")) !== FALSE) 
    {
    while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
    {
        $the_big_array[] = $data;		
    }
    fclose($h);
    }
    for ($i = 2; $i < count($the_big_array); $i++){ ?>
        <div class="grid-item">
            <div class="grid-img-container">
                <img class="image-link" src="<?php echo $the_big_array[$i][3]; ?>">
            </div>
            <h3 class="title"><?php echo $the_big_array[$i][1]; ?></h3>
            <div class="grid-text-container">
                <p class="price"><?php echo $the_big_array[$i][2]; ?></p><p class="unit">kr</p>
            </div>
            <div class="number">
                <span class="minus">-</span>
                <input class="quantity" type="text" value="0"/>
                <span class="plus">+</span>
            </div>
            <div class="btn_container">
                <button class="add_to_cart">Lägg i kundvagnen</button>
            </div>
        </div>
    <?php } ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="bageri"></a>
    <h1>Bageri</h1>
    <p>Färskt bröd i alla dess former. Vetebullar, limpor, rågbröd, knäckebröd och surdegar. Något sött till kaffet kanske?</p>
    
    <div class="grid-container bageri">
    <?php
    $filename = 'database/bageri.csv';
    $the_big_array = []; 
    if (($h = fopen("{$filename}", "r")) !== FALSE) 
    {
    while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
    {
        $the_big_array[] = $data;		
    }
    fclose($h);
    }
    for ($i = 2; $i < count($the_big_array); $i++){ ?>
        <div class="grid-item">
            <div class="grid-img-container">
                <img class="image-link" src="<?php echo $the_big_array[$i][3]; ?>">
            </div>
            <h3 class="title"><?php echo $the_big_array[$i][1]; ?></h3>
            <div class="grid-text-container">
                <p class="price"><?php echo $the_big_array[$i][2]; ?></p><p class="unit">kr</p>
            </div>
            <div class="number">
                <span class="minus">-</span>
                <input class="quantity" type="text" value="0"/>
                <span class="plus">+</span>
            </div>
            <div class="btn_container">
                <button class="add_to_cart">Lägg i kundvagnen</button>
            </div>
        </div>
    <?php } ?>
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