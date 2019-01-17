<?php
include_once 'db.php';
$sql = '';
// Get all the product
if (isset($_POST['getProduct'])){
    $sql = "SELECT * FROM `product` ORDER BY date_added DESC";
}

// Get the product by categorie
if (isset($_POST['cid'])){
    $catID = $_POST['cid'];
    $sql = "SELECT * FROM `product` WHERE `prod_cat`='$catID' ORDER BY date_added DESC";
}

// Output the data
if ($sql !== ''){
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($query)){
        echo
            '<div class="col-4 p-0">'.
                '<div class="card mr-3 mb-3 crd design">'.
                '<img src="../admin/includes/img/'.$row['prod_img'].'" alt="Card image cap"
                            class="card-img-top" style="width: 267px; height:267px;">'.
                '<div class="card-body">'.
                    '<h5 class="card-title">₱ '.$row['price'].'</h5>'.
                    '<a href="#" style="color: black; text-decoration: none;">'.
                        '<p class="card-text">'.$row['name'].'</p>'.
                    '</a>'.
                '</div>'.
                    '<div class="card cd" id="cdOne" style="position: absolute">'.
                        '<div class="card-body txtColor" style="padding-left: 0;padding-right: 0;">'.
                            '<div class="row">'.
                                '<div class="col p-0" >'.
                                    '<a href="../prod_info.php?id='.$row['id'].'" class="btn viewBtn " style="float: right" data-toggle="tooltip" 
                                    data-placement="top" title="View more">'.
                                        '<i class="fas fa-search-plus fa-2x txtColor txt" style="font-size: 40px"></i>'.
                                    '</a>'.
                                '</div>'.
                                '<div class="col p-0">'.
                                    '<a href="javascript:void(0)" data-id="'.$row['id'].'" class="btn viewBtn pBtn" style="float: left" data-toggle="tooltip" 
                                    data-placement="top" title="Add to cart">'.
                                        '<i class="fas fa-cart-plus txtColor txt" style="font-size: 40px"></i>'.
                                    '</a>'.
                                '</div>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
            '</div>';
    }
}
