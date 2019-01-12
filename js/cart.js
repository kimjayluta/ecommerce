$(document).ready(function () {

    // Counting the product in the cart
    function countItem() {
        $.ajax({
            url: 'includes/cart_function.php',
            method: 'post',
            data: {count:1},
            success: function (data) {
                if(data > 0){
                    $('.badge').show();
                    $('.badge').html(data);
                } else {
                    $('.badge').hide();
                }
            }
        })
    }

    function totalTaxOrder(){
        let tax =  0, totalOrder =  0;

        let subTotal = $('#subTotal').val();
        subTotal = Number(subTotal.split(" ")[1]);

        tax = subTotal * 0.12;
        totalOrder = subTotal + tax;

        $('#tax').val('₱ ' + tax.toFixed(2));
        $('#totalOrder').html('<h6>₱ '  + totalOrder + '</h6>');
    }

    function computeSubTotal(){
        // Compute SubTotal
        let sub_total = 0;
        $('#cartProd').find(".total").each(function(i, valElem){
            sub_total += Number($(valElem).val().split(" ")[1]) || 0;
        });

        // Replace subTotal
        $('#subTotal').val('₱ ' + sub_total);
    }

    function computeTotal(elem){

        let qty = !Number($(elem).val()) < 1 ? Number($(elem).val()) : 1;
        let prc =  $(elem).parents("tr").find(".price").val();

        // split the peso sign
        prc = Number(prc.split(" ")[1]);

        // Replace the total
        let total = qty * prc;
        $(elem).parents("tr").find(".total").val('₱ ' + total);
        return total;
    }

    function getProd(){
        $.ajax({
            url: 'includes/cart_function.php',
            method: 'post',
            data: {getProd:1},
            success: function (data) {

                // Put thee data conent
                $('#cartProd').html(data);

                // Compute the subtotal;
                computeSubTotal();
                // Total tax
                totalTaxOrder();
            }
        });
    }

    getProd();
    countItem();


    $('#cartProd').on("keyup keypress", ".qty", function(){
        // Compute the total
        computeTotal(this);
        // Compute the subtotal;
        computeSubTotal();
        // Compute the total order and the tax
        totalTaxOrder();
    });

    let delID, targetBtn;

    // Remove product function
    $('#cartProd').on('click', '.delBtn', function () {
        // Save the delID
        delID = $(this).data("id");
        targetBtn = $(this);
    });
    $('.removeProd').on('click', function () {
        if (typeof delID === "undefined")
            return; // Do not execute ajax when delID is not found

        $.ajax({
            url: 'includes/cart_function.php',
            method: 'post',
            data: {delID:delID},
            success: function (data) {
                $('#delMsg').html(data);

                $(targetBtn).closest("tr").remove();
                countItem();

                // Delete the del ID after use
                delID = undefined;
                targetBtn = undefined;
            }
        });
    });

    //When user click proceed checkout the table of product will be hide

});