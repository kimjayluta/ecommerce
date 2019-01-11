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
        width: 100px;
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
    .ttl{
        border: 0;
        background: none;
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
                <div id="delMsg">

                </div>
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
                               <input type="text" id="subTotal" value="" class="totalBox ttl" disabled="disabled">
                           </td>
                       </tr>
                       <tr class="text-muted">
                           <td class="tdBorder">VAT</td>
                           <td class="tdBorder">
                               <input type="text" id="tax" value="" class="totalBox ttl" disabled="disabled">
                           </td>
                       </tr>
                       <tr class="text-muted">
                           <td>Total Order</td>
                           <td id="totalOrder" style="text-align: right;color: black;">

                           </td>
                       </tr>
                   </tbody>
               </table>
                <a href="#" class="btn addBtn" style="width: 100%">CHECKOUT</a>
            </div>
        </div>
    </div>
</section>
<!--Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove product: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to remove this product from your cart?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <button type="button"  class="btn btn-danger removeProd" data-dismiss="modal">Remove</button>
            </div>
        </div>
    </div>
</div>
<!-- Js -->
<script type="text/javascript">
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
        })

    });
</script>
<?php include "./footer.php"?>
