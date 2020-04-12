$(document).ready(function() {
    var quantity = 0;
    var section = "test";
        $(".plus").click(function(){
            $input = $(this).prev();
            quantity = $input.val();
            quantity = parseInt(quantity);
            quantity = quantity + 1;
            $input.val(quantity);
            $input.change();

            $(this).parent().find(".minus").css(
                "background-color", "#e13205"
            );
        });
        $(".minus").click(function(){
            $input = $(this).next();
            quantity = $input.val();
            quantity = parseInt(quantity);
            if (quantity > 0){
                quantity = quantity - 1;
                $input.val(quantity);
                $input.change();
            }
        });
        $(".quantity").change(function(){
            minusColor($(this));
        });
        $(".add_to_cart").click(function(){
            if ($(this).parent().parent().parent().hasClass("chark")){
                section = "chark";
            }
            if ($(this).parent().parent().parent().hasClass("frukt")){
                section = "frukt";
            }
            AddToCart($(this).parent().parent().index()+1, $(this).parent().parent().find(".quantity").val(), section);
        });
        $(".view-cart").click(function(){
            openCartWindow();
        });
        window.onbeforeunload = function(){
            return '';
        }
});

//Sektion för funktioner
function minusColor(item_quantity){
    if (item_quantity.val() == 0){
        item_quantity.prev().css(
            "background-color", "#bdbbb9"
        )
    }
    else{
        item_quantity.prev().css(
            "background-color", "#e13205"
        )
    }
};
function AddToCart(ID, chosen_quantity, section){
    $.ajax({
        url:'./script/cart.php',
        method: "post",
        data: {ID, chosen_quantity, section}
    })
    .done(function(data){
        var result = JSON.parse(data);
        ID = result.ID;
        var chosen_quantity = result.chosen_quantity;
        var section = result.section;
        console.log("ID:", ID);
        console.log("Kvantitet:", chosen_quantity);
        console.log("Sektion:", section);
    });
    $.ajax({
        url: './database/' + section + '.csv',
        dataType: "text"
    })
    .done(function(file){
        var values = [];
        var allaRader = file.split(/\n/);
    
        var csv_rows = Object.keys(allaRader).length;
        for (let i = 2; i < csv_rows; i++){
            let row = allaRader[i].split(";");
    
            let col = [];
    
            for (let j = 0; j < row.length; j++){
                col.push(row[j]);
            }
    
            values.push(col);
        }
        console.log("Pris:", values[ID-1][2]);
    });
}
function openCartWindow(){
    $(".cart-window").fadeToggle(100);
}
function getPrice(file){
    var values = [];
    var allaRader = file.split(/\n/);

    var csv_rows = Object.keys(allaRader).length;
    for (let i = 2; i < csv_rows; i++){
        let row = allaRader[i].split(";");

        let col = [];

        for (let j = 0; j < row.length; j++){
            col.push(row[j]);
        }

        values.push(col);
    }
    console.log("Pris:", values[2][2]);
}