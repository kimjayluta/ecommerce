<?php
include "header.php";
include "../includes/db.php";

if (isset($_GET['id'])){
    $prodId = $_GET['id'];
    $query = mysqli_query($conn, "SELECT prod_img FROM product WHERE id='$prodId'");
    $img = mysqli_fetch_array($query);
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
        <!--Change photo-->
        <div class="container mt-4 mb-5">
            <div class="card cd">
                <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                    <div class="row">
                        <div class="col">
                            <a href="view_prod.php?id=<?php printer($prodId)?>" class="btn btn-outline-primary mr-1"
                               style="border-radius: 20px">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col" style="text-align: right">
                            <h3>Change photo</h3>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="includes/prod_func.php?pid=<?php printer($prodId)?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="newImage">Upload new photo: </label>
                                        <input type="file" class="form-control" name="newImage"  id="newImage" required>
                                        <button class="btn btn-outline-primary mt-2" type="submit" style="width: 7rem;"
                                                 name="upload"><strong>Upload</strong></button>
                                        </div>
                                    <div class="col-4">
                                        <div class="card" style="border: 0">
                                            <img class="card-img-top" src="includes/img/<?php printer($img[0])?>"
                                                  alt="Card image cap" style="height: 21rem">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php";?>