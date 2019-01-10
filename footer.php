<!--Bootstrap Cdn Js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--Smooth Scroll Js-->
<script src="js/smooth.js"></script>
<script>
$(document).ready(function () {
    // count item in the cart
    countItem();

    // Counting the product in the cart
    function countItem() {
        $.ajax({
            url: 'includes/cart_function.php',
            method: 'post',
            data: {count:1},
            success: function (data) {
                console.log(data);
                if(data > 0){
                    $('.badge').show();
                    $('.badge').html(data);
                } else {
                    $('.badge').hide();
                }
            }
        })
    }
})
</script>
</body>
</html>
