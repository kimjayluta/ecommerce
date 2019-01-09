<?php
include "header.php";
include "../includes/db.php";

$prodId = '';
$name = '';
$price = '';
$cat = '';
$qty = '';
$desc = '';
$img = '';
$msg = '';
$changePhoto = '';
$link = 'product.php';
$txt = '<h3>Add Product</h3>';
$imgUpload = '<label for="prod_img">Image: </label>'.
             '<input type="file" class="form-control" name="prod_img"  id="prod_img" required>';

if (isset($_GET['id'])){
    $prodId = $_GET['id'];
    $link ='view_prod.php?id='.$prodId.'';
    $imgUpload = '';
    $txt = '<h3>Edit Product</h3>';
    // Query the data
    $query = mysqli_query($conn,"SELECT * FROM `product` WHERE `id`='$prodId'");
    // Fetch all data
    while($row = mysqli_fetch_assoc($query)){

        $name = $row['name'];
        $price = $row['price'];
        $qty = $row['qty'];
        $cat = $row['prod_cat'];
        $desc = $row['descrip'];
        $img = $row['prod_img'];
    }

} else if (isset($_GET['success'])) {

    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">'.
              '<strong>Success!</strong> Product is successfully added.'.
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                '<span aria-hidden="true">&times;</span>'.
              '</button>'.
            '</div>';

}

function printer($data){
    echo $data;
}
?>
<title>Order Reports</title>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>TheClothing Co.</h4>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="orders.php">Orders</a>
            </li>
            <li>
                <a href="costumer.php">Costumers</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class="active">
                        <a href="product.php">Products list</a>
                    </li>
                    <li>
                        <a href="category.php">Categories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#report" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports</a>
                <ul class="collapse list-unstyled" id="report">
                    <li>
                        <a href="#">Sales report</a>
                    </li>
                    <li>
                        <a href="#">Invoices</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span>Settings</span>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Account setting</a>
                    </li>
                    <li>
                        <a href="#">Change password</a>
                    </li>
                    <li>
                        <a href="#">My Profile</a>
                    </li>
                    <li>
                        <a href="#">Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Page Content  -->
    <div id="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-dark" style="border-radius: 20px;">
                    <i class="fas fa-angle-double-left"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                Hi, <span> Kim Jay</span>
                                <i class="fas fa-user-circle fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Add prodcut form-->
        <div class="container">
            <div class="card cd">
                <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                    <div class="row">
                        <div class="col">
                            <a href="<?php printer($link)?>" class="btn btn-outline-primary mr-1" style="border-radius: 20px">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col" style="text-align: right">
                            <?php printer($txt)?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php printer($msg) ?>
                    <form action="includes/prod_func.php?id=<?php printer($prodId)?>" method="post"
                          enctype="multipart/form-data">
                        <div id="show_msg"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="prod_name">Name:</label>
                                    <input type="text" class="form-control" id="prod_name" name="prod_name"
                                           value="<?php printer($name)?>" required>
                                </div>
                                <div class="col-3" >
                                    <label for="prod_price">Price:</label>
                                    <input type="number" class="form-control" id="prod_price" name="prod_price"
                                           value="<?php printer($price)?>" style="text-align: right;"  required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="prod_qty">Quantity:</label>
                                    <input type="number" class="form-control" id="prod_qty" name="prod_qty"
                                           value="<?php printer($qty); ?>" required>
                                </div>
                                <div class="col">
                                    <label for="prod_cat">Category:</label>
                                    <select class="form-control" id="prod_cat" name="prod_cat" required>
                                        <?php
                                        // Ini su gabus na categorie
                                            $query = mysqli_query($conn, "SELECT * FROM categorie");
                                            while ($row = mysqli_fetch_array($query)){
                                                if ($row['id'] == $cat){
                                                    echo '<option value="'.$row['id'].'" selected="selected"> '.$row['name'].'</option>';
                                                } else {
                                                    echo '<option value="'.$row['id'].'"> '.$row['name'].'</option>';
                                                }
                                            }
                                            if (mysqli_num_rows($query) < 1){
                                                echo '<option>'.
                                                        'There\'s no category available please add in category window'.
                                                      '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prod_desc">Description: </label>
                            <textarea class="form-control" id="prod_desc" name="prod_desc" rows="3" required><?php printer($desc)?></textarea>
                        </div>
                        <div class="form-group">
                            <?php printer($imgUpload)?>
                        </div>
                        <div class="form-group" style="float: right">
                            <button class="btn btn-outline-primary" type="submit" style="width: 7rem;"
                                    id="btn-submit" name="btn-add"><strong>Submit</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";?>