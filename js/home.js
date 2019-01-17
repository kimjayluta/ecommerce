$(document).ready( function () {
    // Function to get * product
    function getProd() {
        $.ajax({
            url	:"includes/homepage_function.php",
            method:	"POST",
            data	:	{getProduct:1},
            success	:	function(data){
                $("#get_product").html(data);
            }
        })
    }

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

    // Get * product
    getProd();
    // count item in the cart
    countItem();

    // add product in cart function
    $('#get_product').on('click', '.pBtn', function () {
        const pID = $(this).data("id");
        $.ajax({
            url: "includes/cart_function.php",
            method: 'post',
            data: {pID:pID},
            success: function (data) {
                $('#msg').html(data);
                $('.modal').modal('show');
                countItem();
            }
        });
    });

    // Get product by selected category
    $('.list').on('click',function () {
        // Get the id of the selected category
        const cID = $(this).data("id");
        $.ajax({
            url: "includes/homepage_function.php",
            method: "post",
            data: {cid:cID},
            success: function (data) {
                if(data){
                    $("#get_product").html(data);
                } else {
                    $("#get_product").html('<p>No data available</p>');
                }
            }
        });
    });



    // Function for hover effect in category
    $(".item").hover(
        function () {
            $(this).parent("li").css("background-color","whitesmoke");
        },
        function () {
            $(this).parent("li").css("background-color","white");
        }
    );

});