<?php
session_start();
include_once 'db.php';
// to get ip address
$ip_add = getenv("REMOTE_ADDR");
@$uid = $_SESSION['id'];
$sql = '';
// add product in to cart
if (isset($_POST['pID'])){
    $pID = $_POST['pID'];
    if (isset($uid)){
        $query = mysqli_query($conn,"SELECT * FROM cart WHERE prod_id = '$pID' AND user_id = '$uid'");
        // If tig add nya na su product
        if (mysqli_num_rows($query) > 0){
            // Kpag tig add nya na
            echo '<h5 class="text-warning" style="font-family: sans-serif">Product is already added in your cart...</h5>';
        } else {
            // Kapag nka login ang user session_id gagamiton ta pag insert
            $sql = "INSERT INTO `cart`(`prod_id`,`ip_add`,`user_id`,`qty`) VALUES ('$pID','$ip_add','$uid',1)";
        }
    } else {
        $query = mysqli_query($conn,"SELECT * FROM cart WHERE prod_id = '$pID' AND ip_add = '$ip_add' AND `user_id` = '-1'");
        // If tig add nya na su product
        if (mysqli_num_rows($query) > 0){
            // Kpag tig add nya na
            echo '<h5 class="text-warning" style="font-family: sans-serif">Product is already added in your cart...</h5>';
        } else {
            // Kapag dae pa nka login esisave ta su data gamit ang ip_address
            $sql = "INSERT INTO `cart`(`prod_id`,`ip_add`,`user_id`,`qty`) VALUES ('$pID','$ip_add',-1,1)";
        }
    }
    // Execute query
    if ($sql !== ''){
        $query = mysqli_query($conn, $sql);
        if ($query){
            echo '<h5 class="text-success" style="font-family: sans-serif">Product is successfully added in your cart...</h5>';
        } else {
            echo 'error';
        }
    }
}
// Counting the product in the cart
if(isset($_POST['count'])){
    if (isset($_SESSION['id'])){
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $uid";
    } else {
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
    }

    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    echo $row['count_item'];
    exit;
}