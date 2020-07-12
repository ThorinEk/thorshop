<!DOCTYPE html>
<html lang="sv">
<title>Nordatlas | Handla online </title>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Thorshop - prisvärda råvaror med hög kvalitet">
  <meta name="keywords" content="Nordatlas, svensk minecraft, e-handel, nordatlas handla, butik">
  <meta name="author" content="ThorinEk">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Reloader - Ta bort innan publicering-->
  <!--<meta http-equiv="refresh" content="10">-->
  <!--CSS Stilmall-->
  <link rel="icon" type="image/png" href="./img/favicon.png">
  <link rel="stylesheet" type="text/css" href='style/style.css'>
  <link rel="stylesheet" type="text/css" href='style/mobile.css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
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
                <li><a href="#redstone">Rödsten</a></li>
                <li><a href="#verktyg">Verktyg</a></li>
                <li><a href="#rustning">Rustning</a></li>
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

            <div class="purchase-confirmation">
                <h1><i class="fa fa-check-circle"></i>Tack för din beställning!</h1>
                <p>En plocksedel har genererats och våra lagermedarbetare hanterar din order. Du kan stänga ned sidan eller fortsätta handla. <br><br>Om det finns täckning på ditt konto debiteras du på spelvaluta när varorna levererats.</p>
            </div>

            <form method="post" action="./tack-for-din-bestallning.php">
                <h3>Beställ varor i kundvagnen</h3>
                <label for="mcName">Ditt Minecraftnamn</label>
                <br>
                <input type="text" class="form-control" placeholder="Ditt exakta namn i Minecraft" id="mcName" name="mcName" required>
                <br>
                <label for="city">Din stad på Nordatlas</label>
                <br>
                <input type="text" class="form-control" placeholder="Ange staden du bor i" id="city" name="city" required>
                <br>
                <label>Fraktalternativ</label>
                <br>
                <select id="freight" name="fraktalternativ">
                    <option selected="selected" value="Nordpost">NordPost</option>
                    <option value="LDH">LDH Express</option>
                </select>
                <br>
                <input type="number" style="display:none;" class="form-control" placeholder="Ditt telefonnummer" id="nummer" name="telefonnummer" required>
                <br>
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
        include 'get_products.php';
        ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="frukt"></a>
    <h1>Frukt</h1>
    <p>Här hittar du alltid färsk frukt att fylla upp fruktkorgen med. Goda äpplen, apelsiner och bananer blir en god fruktsallad eller varför inte en uppfriskande smoothie?</p>
    
    <div class="grid-container frukt">
        <?php
        $filename = 'database/frukt.csv';
        include 'get_products.php';
        ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="bageri"></a>
    <h1>Bageri</h1>
    <p>Färskt bröd i alla dess former. Vetebullar, limpor, rågbröd, knäckebröd och surdegar. Något sött till kaffet kanske?</p>
    
    <div class="grid-container bageri">
        <?php
        $filename = 'database/bageri.csv';
        include 'get_products.php';
        ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="redstone"></a>
    <h1>Rödsten</h1>
    <p>Lev modernt och effektivt med den senaste rödstenstekniken. Vi har allt du behöver oavsett om du är en hemmafixare eller rent av ett proffs.</p>
    
    <div class="grid-container redstone">
        <?php
        $filename = 'database/redstone.csv';
        include 'get_products.php';
        ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="verktyg"></a>
    <h1>Verktyg</h1>
    <p>Här hittar du bland annat vapen, fiskespö och annat som är bra att ha hemma i förrådet.</p>
    
    <div class="grid-container verktyg">
        <?php
        $filename = 'database/verktyg.csv';
        include 'get_products.php';
        ?>
    </div>

    <br><br>
    <hr>
    <a class="anchor" id="rustning"></a>
    <h1>Rustning</h1>
    <p>Vi har skyddsutrustningen för dina äventyr. Lev trendigt med en stilren diamantrustning från vårt sortiment.</p>
    
    <div class="grid-container rustning">
        <?php
        $filename = 'database/rustning.csv';
        include 'get_products.php';
        ?>
    </div>

    <div class="pageBottom">
        <div class="bottom-container">
            <img class="sitelogo" src="./img/ica.jpg">
            <p><strong>Information</strong><br><span class="tooltip" style="text-decoration:underline;">Köpvillkor<span class="tooltiptext">På denna webbplats handlar du med spelvaluta. Pengarna dras från ditt konto vid leverans om det finns tillräckligt på kontot.</span></span><br><span class="tooltip" style="text-decoration:underline;">Så går det till<span class="tooltiptext">När du genomfört en beställning genereras en plockorder för varorna. Varorna packas på ICA:s Centrallager på Torsvik och levereras med Nordpost till ett ombud i din stad.</span></span></p>
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