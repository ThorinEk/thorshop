<!DOCTYPE html>
<html lang="sv">
<title>Thorshop</title>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Thorshop - prisvärda läkemedelsprodukter med hög kvalitet">
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
        <div class="cart-window-container">
            <div class="cart-summary">
                <h2>Summa</h2><h2 class="cart-total">22</h2>
            </div>
        </div>
    </div>
<div class="wrapper main">
    <a class="anchor" id="chark"></a>
    <h1>Chark</h1>
    <p>Saftig biff, fågel eller fina fisken. Här kan du handla allt för din gryta, gratäng och grillat.</p>   
    <div class="grid-container">
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
            <div class="grid-img-container">
                <img src="<?php echo $the_big_array[$i][3]; ?>">
            </div>
            <h3><?php echo $the_big_array[$i][1]; ?></h3>
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
    
    <div class="grid-container">
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
                <img src="<?php echo $the_big_array[$i][3]; ?>">
            </div>
            <h3><?php echo $the_big_array[$i][1]; ?></h3>
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
            <p><strong>ICA Centrallager</strong><br>Torsvik<br>Logpoint South Sweden</p>
            <p><strong>Information</strong><br><a href="terms">Köpvillkor</a><br><a href="about">Så går det till</a></p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</body>
</html>