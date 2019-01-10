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
<script type="text/javascript" src="js/qty_func.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        getProd();
        // To output the product
        function getProd(){
            $.ajax({
                url: 'includes/cart_function.php',
                method: 'post',
                data: {getProd:1},
                success: function (data) {
                    $('#cartProd').html(data);
                }
            });
        }
    });
</script>
<?php include "./footer.php"?>
