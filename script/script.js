$(document).ready(function() {
    var quantity = 0;
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