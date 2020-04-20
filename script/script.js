var order_list = [];
var list_number = 0;
//Copyright Gustav Persson 2020
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
            if ($(this).parent().parent().parent().hasClass("bageri")){
                section = "bageri";
            }
            AddToCart(
                $(this).parent().parent().index()+1, 
                $(this).parent().parent().find(".quantity").val(), 
                section,
                order_list, 
                list_number);

            $(".add_to_cart").one("click", function(){
                $(".cart-footer form").css(
                    "display", "initial"
                )
            });

        });
        $(".view-cart").click(function(){
            openCartWindow();
            $(this).find("i").toggleClass("fa-times");
            $(this).find("i").toggleClass("fa-shopping-cart");
        });
        $(".cart-footer form").submit(function(event) {
            event.preventDefault();

            function printArr(order_list){
            let string_list = "";
            let url = "http";
                for (let item of order_list){
                    //if (Array.isArray(item)) string_list += printArr(item);
                    if (String(item).includes(url)){
                        string_list += item + ", ";
                    }
                    else{
                        //string_list += printArr(item);
                        string_list += item + ",";
                    }
                }
            return string_list;
            }
            order_list = printArr(order_list);
            order_list = order_list.substring(0,order_list.length-2);
            console.log("order-list:", order_list);

            $.ajax({
            type: 'post',
            url: './tack-for-din-bestallning.php',
            data: $('.cart-footer form').serialize() +  '&shopping_list=' + order_list,
            success: function () {
              alert('form was submitted');
            }
            })
        });
        $(".show-purchases").click(function(){
            console.log(order_list);
            $(".purchase-list").text("test");
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
function AddToCart(ID, chosen_quantity, section, order_list, list_number){
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

        if (price > 0){
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

            order_list[list_number] = [list_number,title,price,chosen_quantity,image_link];

            console.log(order_list);

            IncreaseNumber();
            console.log("list_number:", list_number);
        }
        $(".delete-product").click(function(){
            $(this).parent().parent().remove();
            UpdateCartTotal();
            DecreaseNumber();

            console.log($(this).index($(this)));
        });
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
function RemoveProductFromCart(){
    console.log("ta bort");
}
function IncreaseNumber(){
    list_number = parseInt(list_number) + 1;
}
function DecreaseNumber(){
    list_number = parseInt(list_number) - 1;
}