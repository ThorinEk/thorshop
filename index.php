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
  <meta http-equiv="refresh" content="10">
  <!--CSS Stilmall-->
  <link rel="stylesheet" type="text/css" href='style/style.css'>
  <link rel="stylesheet" type="text/css" href='style/mobile.css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="MainMenu">
        <span class="logoContainer">
            <a>
                <img class="sitelogo" src="https://upload.wikimedia.org/wikipedia/commons/7/74/ICA-logotyp.png">
            </a>
        </span>
        <div class="wrapper">
            <ul>
                <li><a href="#chark">Chark</a></li>
                <li><a href="#chark">Frukt</a></li>
                <li><a href="#chark">Bageri</a></li>
            </ul>
        </div>
    </div>
<div class="wrapper main">   
    <h1 id="chark">Chark</h1>
    <p>Saftig biff, fågel eller fina fisken. Här kan du handla allt för din gryta, gratäng och grillat.</p>   
    <div class="grid-container">
    <?php
    $filename = 'database/chark.csv';
    // The nested array to hold all the arrays
    $the_big_array = []; 
    // Open the file for reading
    if (($h = fopen("{$filename}", "r")) !== FALSE) 
    {
    // Each line in the file is converted into an individual array that we call $data
    // The items of the array are comma separated
    while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
    {
        // Each individual array is being pushed into the nested array
        $the_big_array[] = $data;		
    }
    // Close the file
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
        </div>
    <?php } ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</body>
</html>