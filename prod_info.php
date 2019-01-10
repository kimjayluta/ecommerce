<?php
include "./header.php";
include "includes/db.php";
include  "navbar.php";
$loggedIn = true;

if (!$_SESSION){
    $loggedIn = false;
}

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
    $row = mysqli_fetch_array($query);
}
?>
<title>Home</title>
<style>
    body{
        background-color: #f4f3ef;
    }
    .cd{
        border-radius: 12px;
        box-shadow: 0 6px 10px -4px rgba(0,0,0,.15);
    }
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
    .addBtn{
        width: 100%;
        background-color: black;
        color: white;
        border:0;
    }
    .addBtn:hover {
        background-color: #343a40;
        color: white;

    }
</style>
<section>
    <div class="container mt-4">
        <div class="card cd">
            <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                <div class="row">
                    <div class="col">
                        <a href="home.php" class="mr-1">
                            <i class="fas fa-arrow-left"></i> Home
                        </a>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="card-body mb-4">
                <div class="row">
                    <div class="col-5">
                        <img src="admin/includes/img/<?php echo $row['prod_img']?>" alt="" class="card-img-top ml-2"
                             style="width: 25rem; height: 25rem;">
                    </div>
                    <div class="col" style="margin-left: -3rem;">
                        <div class="card-body">
                            <!--Product Id-->
                            <small class="card-subtitle text-muted">ITEM ID: 000<?php echo $row['id']?></small>
                            <!--Product name-->
                            <h4 class="card-title"><?php echo $row['name']?></h4>
                            <hr>
                            <!--Description-->
                            <h6 class="text-muted"><?php echo $row['descrip']?></h6>
                            <!--Price-->
                            <h5>₱ <?php echo $row['price']?></h5>
                            <!--Quantity-->
                            <p class="m-0">Qty:</p>
                            <form id="myform" method="POST" action="#">
                                <input type="button" value="-" class="qtyMinus buton" style="font-weight: bold;" disabled>
                                <input type="text" name="qty" id="qty" value="1" class="qty" style="">
                                <input type='button' value="+" class="qtyPlus buton" style="background-color: white">
                            </form>
                            <!-- Button add to cart -->
                            <a href="#" class="btn mt-3 addBtn btn-dark"> ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="js/prod_info.js"></script>
<script type="text/javascript" src="js/count_prod.js"></script>

<?php include "./footer.php"?>