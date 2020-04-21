<?php
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