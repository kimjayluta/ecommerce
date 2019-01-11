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
    .totalBox{
        margin-bottom: 0!important;
        width: 70px;
        text-align: right;
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
                    <tbody id="cartProd">

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
                           <td class="tdBorder" >
                               <input type="text" id="subTotal" value="" class="totalBox" disabled="disabled">
                           </td>
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
<script type="text/javascript" src="js/count_prod.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        function tax(){
            let tax =  0;
            let subTotal = $('#cartProd').find('#subTotal').val();
            console.log(subTotal);
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
                    tax();
                }
            });
        }

        getProd();


        $('#cartProd').on("keyup keypress", ".qty", function(){
            // Compute the total
            computeTotal(this);
            // Compute the subtotal;
            computeSubTotal();
        });
    });
</script>
<?php include "./footer.php"?>
