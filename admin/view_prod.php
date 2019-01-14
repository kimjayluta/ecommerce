<?php
include "header.php";
include "../includes/db.php";

if (isset($_GET['id'])){
    $pId = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM product WHERE `id`='$pId'");

    while($row = mysqli_fetch_assoc($query)){

        $name = $row['name'];
        $price = $row['price'];
        $qty = $row['qty'];
        $desc = $row['descrip'];
        $img = $row['prod_img'];
        $catId = $row['prod_cat'];
    }

    $data = mysqli_query($conn, "SELECT name FROM categorie WHERE id=$catId");
    $catName = mysqli_fetch_array($data);


}

function printer($data){
    echo $data;
}
?>
<title>Order Reports</title>
<style>
    #icon{
        font-size:30px;
    }
    #dropdownMenuButton{
        margin-left: 365px;
        cursor: pointer;
        text-align: center;
    }
    .drp {
        color: #6c757d;
        font-family: sans-serif;
    }
    .drp :hover{
        color: black !important;
        font-weight: bold;

    }
</style>
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
                        <a href="../includes/account_function.php?logout">Sign out</a>
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
        <div class="container ">
            <div class="card cd">
                <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                    <div class="row">
                        <div class="col">
                            <a href="product.php" class="btn btn-outline-primary mr-1" style="border-radius: 20px">
                                <i class="fas fa-arrow-left" id="ic"></i>
                            </a>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                                <div class="dropdown-toggle" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog " id="icon"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 30px!important;">
                                    <a class="dropdown-item drp" href="add_prod.php?id=<?php printer($pId)?>">Edit information</a>
                                    <a class="dropdown-item drp" href="change_photo.php?id=<?php printer($pId)?>">Change photo</a>
                                    <button data-id="<?php printer($pId)?>" class="deleteBtn dropdown-item drp"
                                            data-toggle="modal" data-target="#deleteModal">
                                        Delete product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mb-3 mt-2">
                    <div class="row">
                        <div class="col-5 ">
                            <div class="card" style="width: 23rem">
                                <img class="card-img-top" src="includes/img/<?php printer($img)?>" style="height: 24rem">
                            </div>
                        </div>
                        <div class="col">
                            <form>
                                <div id="show_msg"></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="prod_name">Name:</label>
                                            <input type="text" class="form-control" id="prod_name" name="prod_name"
                                                   value="<?php printer($name)?>" readonly>
                                        </div>
                                        <div class="col-3" >
                                            <label for="prod_price">Price:</label>
                                            <input type="number" class="form-control" id="prod_price" name="prod_price"
                                                   value="<?php printer($price)?>" style="text-align: right;"  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="prod_qty">Quantity:</label>
                                            <input type="number" class="form-control" id="prod_qty" name="prod_qty"
                                                   value="<?php printer($qty)?>" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="prod_cat">Category:</label>
                                            <input type="text" class="form-control" id="prod_cat" name="prod_cat"
                                                   value="<?php printer($catName[0])?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prod_desc">Description: </label>
                                    <textarea class="form-control" id="prod_desc" name="prod_desc" rows="3" readonly><?php printer($desc)?></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="includes/prod_func.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title">Delete Product: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete this product permanently from the system?
                <input type="hidden" id="deleteId" name="deleteId" value="<?php printer($pId)?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="deleteProd" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#dropdownMenuButton').hover( function () {
            $('#icon').toggleClass('fa-spin');
        })
    });
</script>
<?php include "footer.php";?>