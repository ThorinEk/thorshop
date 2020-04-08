$(document).ready(function() {
    $(".minus").css(
        "background-color", "#bdbbb9"
    );
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
            if (quantity == 0){
                $(this).css(
                    "background-color", "#bdbbb9"
                );
            }
        });
});