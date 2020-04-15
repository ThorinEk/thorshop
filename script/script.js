//Copyright Gustav Persson 2020
$(function() {
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
            AddToCart(
                $(this).parent().parent().index()+1, 
                $(this).parent().parent().find(".quantity").val(), 
                section);
        });
        $(".view-cart").click(function(){
            openCartWindow();
        });
        window.onbeforeunload = function(){
            return '';
        }
        $(".remove-product").click(function(){
            var productToRemove = $(this);
            RemoveProductFromCart(productToRemove);
        });
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
        ID = ID - 1;
        var price = values[ID][2];
        price = price * chosen_quantity;
        var title = values[ID][1];
        var image_link = values[ID][3];

        console.log("bildlänk:", image_link)
        console.log("pris:", price);
        console.log("ID:", ID);
        console.log("Kvantitet:", chosen_quantity);
        console.log("Sektion:", section);

        var cartRow = document.createElement('div');
        var cartItems = document.getElementsByClassName('cart-window-container')[0];
        var cartRowContents = `                
        <div class="cart-product">
            <div class="image-title">
                <img class="cart-image" src="${image_link}">
                <p class="product-title">${title}</p>
            </div>
            <div class="quantity-price">
                <p class="basket-quantity">${chosen_quantity}</p><p class="quantity-unit">st</p>
                <p class="product-price">${price}</p><p class="price-unit">kr</p>
            </div>
            <div class="remove-product">
                <a class="delete-product"><i class="fa fa-trash tooltip"><span class="tooltiptext">Ta bort vara</span></i></a>
            </div>
        </div>`
        cartRow.innerHTML = cartRowContents;
        cartItems.append(cartRow);

        UpdateCartTotal();
    });
}
function openCartWindow(){
    $(".cart-window").fadeToggle(100);
}
function UpdateCartTotal(){
    var cart_sum = parseInt(0);
    let cart_products = $(".cart-product");
    cart_products.each(function(){
        cart_sum += parseInt($(this).find(".product-price").text());
    });
    console.log("summa", cart_sum);
    $(".cart-total").text(cart_sum);
}
function RemoveProductFromCart(product){
    console.log("test");
}