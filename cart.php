<?php
include "./header.php";
include "./includes/db.php";
include "./navbar.php";
$loggedIn = true;

if (!$_SESSION){
    $loggedIn = false;
}

?>
<title>Cart</title>
<style>
    .buton{
        font-weight: bold;
        background-color: whitesmoke;
        border: 1px solid gray;
        cursor: pointer;
    }
    .qty{
        margin-bottom: 0!important;
        width: 50px;
        text-align: center;
    }
    .tdBorder{
        border-top: none !important;
    }
    .addBtn{
        width: 100%;
        background-color: black;
        color: white;
    }
    .addBtn:hover {
        background-color:#343a40;
        color: white;
    }
</style>
<section>
    <div class="container mt-5">
        <div class="card" style="border: 0">
            <div class="card-header" style="text-align: center; background-color: transparent; border: 0">
                <h3>Shopping Cart</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="tdBorder"></th>
                        <th scope="col" class="tdBorder">Item</th>
                        <th scope="col" class="tdBorder">Product Info</th>
                        <th scope="col" class="tdBorder">Quantity</th>
                        <th scope="col" class="tdBorder">Price</th>
                        <th scope="col" class="tdBorder">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </th>
                        <td>
                            <div class="card" style="width: 92px;">
                                <img src="img/c3.PNG" alt="#" class="card-img-top">
                            </div>
                        </td>
                        <td>
                           <div class="card" style="width: 185px;border: 0;">
                               <span> Streetwear Red Snapback </span>
                           </div>
                        </td>
                        <td>
                            <form id="myform" method="POST" action="#">
                                <input type="button" value="-" class="qtyMinus buton" style="font-weight: bold;" disabled>
                                <input type="text" name="qty" id="qty" value="1" class="qty" style="">
                                <input type='button' value="+" class="qtyPlus buton" style="background-color: white">
                            </form>
                        </td>
                        <td class="text-muted">₱849.75</td>
                        <td class="text-muted">₱849.75</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-4">
               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col" class="col tdBorder"> Summary </th>
                           <th scope="col" class="col tdBorder"></th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr class="text-muted">
                           <td class="tdBorder">Subtotal</td>
                           <td class="tdBorder">₱849.75</td>
                       </tr>
                       <tr class="text-muted">
                           <td class="tdBorder">VAT</td>
                           <td class="tdBorder">₱849.75</td>
                       </tr>
                       <tr class="text-muted">
                           <td>Total Order</td>
                           <td>₱849.75</td>
                       </tr>
                   </tbody>
               </table>
                <a href="#" class="btn addBtn" style="width: 100%">CHECKOUT</a>
            </div>
        </div>
    </div>
</section>
<!-- Js -->
<script type="text/javascript">
    $(document).ready(
        //Quantity function add and minus
        function () {
            let j = jQuery;
            let minus = $('.qtyMinus');
            let plus = $('.qtyPlus');
            let currentVal = j('#qty').val();
            let defVal = 1;


            //Set default value
            $('#qty').val(defVal);
            $(minus).css("cursor", 'not-allowed');

            //Add button
            $(plus).on('click', function () {
                $('#qty').val(++defVal);
                // Enable - button when the value of #qty is greater than 1
                if(defVal > 1){
                    $(minus).prop("disabled", false);
                    $(minus).css("background-color", 'white');
                    $(minus).css("cursor", 'pointer');

                }
                // To disable + button when the value of #qty is greater than 10
                if(defVal > 9){
                    $(plus).prop("disabled", true);
                    $(plus).css("background-color", 'whitesmoke');
                    $(plus).css("cursor", 'not-allowed');
                }
            });

            //Minus button
            $(minus).on('click', function () {
                $('#qty').val(--defVal);
                // To disable - button when the value of #qty is equal to 1
                if(defVal > 0 && defVal < 2){
                    $(minus).prop("disabled", true);
                    $(minus).css("background-color", 'whitesmoke');
                    $(minus).css("cursor", 'not-allowed');
                }
                // To disable + button when the value of #qty is less than 10
                if(defVal < 10){
                    $(plus).prop("disabled", false);
                    $(plus).css("background-color", 'white');
                    $(plus).css("cursor", 'pointer');
                }
            });
        }
    );
</script>
<?php include "./footer.php"?>
