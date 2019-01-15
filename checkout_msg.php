<?php
include "./header.php";
include "./navbar.php";
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
                <h3 id="title">Thank you Shopper!</h3>
            </div>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Order successfully done!</h4>
                <p>Aww yeah, Thank you for shopping with <strong> TheClothing Co.</strong>
                your order will be ship to you immediately, hope you love your new products.</p>
                <hr>
                <p class="mb-0">Thank you very much <a href="home.php">continue Shopping . . .</a></p>
            </div>
        </div>
    </div>
</section>
<!-- Js -->
<script type="text/javascript" src="js/count_prod.js"></script>
<?php include "./footer.php"?>
