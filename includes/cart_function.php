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
    // if user is loggedIn
    if (isset($uid)){
        $query = mysqli_query($conn,"SELECT * FROM cart WHERE prod_id = '$pID' AND user_id = '$uid'");
        // If tig add nya na su product
        if (mysqli_num_rows($query) > 0){
            // Kpag tig add nya na
            echo '<h6 class="text-warning">Product is already added in your cart...</h6>';
        } else {
            // Kapag nka login ang user session_id gagamiton ta pag insert
            $sql = "INSERT INTO `cart`(`prod_id`,`ip_add`,`user_id`,`qty`) VALUES ('$pID','$ip_add','$uid',1)";
        }
    } else {
        $query = mysqli_query($conn,"SELECT * FROM cart WHERE prod_id = '$pID' AND ip_add = '$ip_add' AND `user_id` = '-1'");
        // If tig add nya na su product
        if (mysqli_num_rows($query) > 0){
            // Kpag tig add nya na
            echo '<h6 class="text-warning">Product is already added in your cart...</h6>';
        } else {
            // Kapag dae pa nka login esisave ta su data gamit ang ip_address
            $sql = "INSERT INTO `cart`(`prod_id`,`ip_add`,`user_id`,`qty`) VALUES ('$pID','$ip_add',-1,1)";
        }
    }
    // Execute query
    if ($sql !== ''){
        $query = mysqli_query($conn, $sql);
        if ($query){
            echo '<h5 class="text-success">Product is successfully added in your cart...</h5>';
        } else {
            echo 'error';
        }
    }
}

// Counting the product in the cart
if(isset($_POST['count'])){
    if (isset($uid)){
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $uid";
    } else {
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
    }

    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    echo $row['count_item'];
    exit;
}

// To output the product in the cart page
if (isset($_POST['getProd'])){
    $sql = '';

    if (isset($uid)){
        $sql = "SELECT a.id,a.name,a.price,a.prod_img,b.id,b.qty FROM product a,cart  b
                WHERE a.id = b.prod_id AND b.ip_add = '$ip_add' AND user_id = '$uid'";
    } else {
        $sql = "SELECT a.id,a.name,a.price,a.prod_img,b.id,b.qty FROM product a,cart b
                WHERE a.id=b.prod_id AND ip_add='$ip_add' AND user_id = -1";
    }
    $query = mysqli_query($conn, $sql);

    while ($row =  mysqli_fetch_array($query)){
        echo
            '<tr>'.
                '<th scope="row">'.
                    '<button class="btn btn-danger delBtn" data-id="'.$row['id'].'" data-toggle="modal" 
                            data-target="#deleteModal">'.
                        '<i class="fas fa-trash-alt"></i>'.
                    '</button>'.
                '</th>'.
                '<td>'.
                    '<img src="../admin/includes/img/'.$row['prod_img'].'" alt="#" class="card-img-top"
                        style="width: 92px; height:92px;">'.
                '</td>'.
                '<td>'.
                   '<div class="card" style="width: 185px;border: 0;">'.
                       '<span> '.$row['name'].'</span>'.
                   '</div>'.
                '</td>'.
                '<td>'.
                    '<input type="text" name="qty" value="'.$row['qty'].'" class="qty">'.
                '</td>'.
                '<td>'.
                    '<input type="text" name="price" value="₱ '.$row['price'].'" class="totalBox price" 
                        disabled="disabled">'.
                '</td>'.
                '<td>'.
                    '<input type="text" name="total" value="₱ '.$row['price'] * $row['qty'] .'" class="totalBox total" 
                        disabled="disabled">'.
                '</td>'.
            '</tr>';
    }
}

// Remove product from cart
if(isset($_POST['delID'])){

    $delID = $_POST['delID'];

    if (isset($uid)){
        $sql = "DELETE FROM cart WHERE id = '$delID' AND user_id = '$uid' AND ip_add = '$ip_add'";
    } else {
        $sql = "DELETE FROM cart WHERE id ='$delID' AND ip_add = '$ip_add' AND user_id = -1";
    }

    $query = mysqli_query($conn, $sql);
    if ($query){
        echo
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <h6>Product successfully removed.</h6>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    } else {
        echo $sql;
    }

}