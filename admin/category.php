<?php
include "header.php";
include "../includes/db.php";
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
                    <li >
                        <a href="product.php">Products list</a>
                    </li>
                    <li class="active">
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
                    <i class="fas fa-align-justify" ></i>
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
        <!--Content here-->
        <div class="container">
            <div class="card cd">
                <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                    <div class="row">
                        <div class="col">
                            <h3>Categories</h3>
                        </div>
                        <div class="col" style="text-align: right">
                            <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#addModal"
                            style="border-radius: 20px;">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="dataTable">
                    <table class="table" id="cat_table">
                        <thead>
                            <tr class="table-info" style="font-family: sans-serif">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" >Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM categorie");
                                if (mysqli_num_rows($query) > 0){
                                    while($row = mysqli_fetch_assoc($query)){
                                        // to print all of the products
                                        echo '<tr>'.
                                             '<th scope="row">'.$row['id'].'</th>'.
                                             '<td>'.$row['name'].'</td>'.
                                             '<td class="pl-5">'.$row['prod_qty'].'</td>';
                                             if ($row['prod_qty'] == 0){
                                                echo '<td class="text-muted">Out of stock</td>';
                                             } else {
                                                echo '<td class="text-success">Active</td>';
                                             }
                                        echo '<td style="text-align: center">'.
                                             '<button data-id="'.$row['id'].'" type="button" class="btn btn-info btn-sm editBtn mr-1" 
                                                    data-toggle="modal" data-target="#addModal">'.
                                             '<i class="fas fa-pen"></i>'.
                                             '</button>'.
                                             '<button data-id="'.$row['id'].'" type="button" class="btn btn-danger btn-sm deleteBtn" 
                                                    data-toggle="modal" data-target="#deleteModal">'.
                                             '<i class="far fa-trash-alt"></i>'.
                                             '</button>'.
                                             '</td>'.
                                             '</tr>';
                                    }
                                } else {
                                    echo '<h4 style="color:indianred">Please add some categories!</h4>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/addCategory.php" method="post">
                    <div class="form-group">
                        <input type="hidden" id="catId" value="" name="id" >
                        <label for="cat_name">Name: </label>
                        <input type="text" class="form-control" id="cat_name" name="name" value="" required="required">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-cat">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="includes/addCategory.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete this category permanently from the system?
                <input type="hidden" id="deleteId" name="deleteId" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <button type="submit"  class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#cat_table').DataTable();
    });
</script>
<script type="text/javascript" src="js/category.js"></script>
<?php include "footer.php";?>