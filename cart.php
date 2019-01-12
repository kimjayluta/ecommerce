<?php
include "./header.php";
include "./includes/db.php";
include "./navbar.php";
$loggedIn = false;
// Kung nakalogin ang user
if ($_SESSION){
    $loggedIn = true;
}
$listOfCity = array( 'Metro manila','Abra','Agusan Del Norte','Agusan Del Sur','Aklan', 'Albay','Antique','Apayao',
                    'Aurora','Basilan','Bataan','Batanes','Batangas','Benguet','Biliran','Bohol','Bukidnon','Bulacan',
                    'Cagayan','Camarines Norte', 'Camarines Sur','Camiguin','Capiz','Catanduanes','Cavite','Cebu',
                    'Compostela Valley','Cotobato','Davao del Norte','Davao del Sur','Davao Oriental','Dinagat Island',
                    'Eastern Island','Eastern Samar','Guimaras','Ifugao','Ilocos Norte','Ilocos Sur','Iloilo','Isabela',
                    'Kalinga','La union','Laguna','Lanao del Norte','Lanao del Sur','Leyte','Maguindanao','Marinduque',
                    'Masbate','Misamis Occidental','Misamis Oriental','Mountain Province','Negros Occidental',
                    'Negros Oriental','Northern Samar','Nueva Ecija','Nueva Vizcaya','Occidental Mindoro','Palawan',
                    'Pampanga','Pangasinan','Quezon','Qurino','Rizal','Romblon','Samar','Sarangani','Suariff Kabunsuan',
                    'Siquijor', 'Sorsogon','South Cotobato','Southern Leyte','Sultan Kudarat','Sulu','Surigao del Norte',
                    'Surigao del Sur','Tarlac','Tawi-tawi','Zambales','Zamboanga del Norte','Zamboanga del Sur','Zamboanga Sibugay');

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
                <div id="delMsg"></div>
                <table class="table" id="prodTable">
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
                <form id="formCheckout" style="display: none">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name: </label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contact Number: </label>
                            <input type="number" class="form-control" id="cnum">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address: </label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Street, Baranggay">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <?php
                                foreach ($listOfCity as $city){
                                    echo '<option value="'.$city.'">'.$city.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                </form>
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
                <a href="javascript:void(0)" class="btn addBtn" id="placeOrder" style="display: none">PLACE ORDER</a>
                <a href="javascript:void(0)" class="btn addBtn" id="checkout" style="width: 100%" >PROCEED TO CHECKOUT</a>
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
<script type="text/javascript" src="js/cart.js"></script>
<script>
   $(document).ready(function () {
       
       $('#checkout').on('click', function () {
           $('#prodTable').hide();
           $(this).hide();

           $('#placeOrder').show();
           $('#formCheckout').show();
       });
       
       $('#placeOrder').on('click', function () {

           $.ajax({
               url: 'includes/cart_function.php',
               method: 'post',
               data: {
                   name: $('#name').val(),
                   cnum: $('#cnum').val(),
                   strt: $('#strt').val(),
                   brgy: $('#brgy').val(),
                   city: $('#city').val(),
                   state: $('#state').val(),
                   zipCode: $('#zipCode').val(),
               },
               success: function () {

               }
           })
       });
   })
</script>
<?php include "./footer.php"?>
