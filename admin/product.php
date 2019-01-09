<?php
include "header.php";
include "../includes/db.php";
$msg = '';
if (isset($_GET['delID'])){
    $id = $_GET['delID'];

    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-family: sans-serif;">'.
            '<strong>Success!</strong> Product ID: '.$id.' is successfully deleted.'.
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
            '<span aria-hidden="true">&times;</span>'.
            '</button>'.
            '</div>';
}
?>
<title>Order Reports</title>
<style>
    #prodinfo:hover{
        text-decoration: underline;
        cursor: pointer;
        color: blue;
    }
    #viewInfo :hover{
        color: #007bff;
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
        <!--Content here-->
        <div class="container">
            <div class="card cd">
                <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                    <div class="row">
                        <div class="col">
                            <h3>Product List</h3>
                        </div>
                        <div class="col" style="text-align: right">
                            <a href="add_prod.php" class="btn btn-primary mr-1" style="border-radius: 20px">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $msg?>
                    <table class="table" id="prod_table">
                        <thead>
                        <tr class="table-info" style="font-family: sans-serif">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            // query all product
                            $query = mysqli_query($conn,"SELECT * FROM product ORDER BY date_added DESC ");
                            $product  = array();
                            $num = 1;
                            while ($row = mysqli_fetch_array($query)){
                                array_push($product, $row);
                            }
                            // clear memory
                            mysqli_free_result($query);

                            foreach ($product as $prod){
                                echo '<tr>'.
                                     '<th scope="row">'.$prod['id'].'</th>'.
                                     '<td><a href="#" id="prodinfo">'.$prod['name'].'</a></td>'.
                                     '<td>₱ '.$prod['price'].'</td>'.
                                     '<td class="pl-5">'.$prod['qty'].'</td>';

                                if ($prod['qty'] == 0){
                                    echo '<td class="text-muted">Out of stock</td>';
                                } else {
                                    echo '<td class="text-success">Active</td>';
                                }

                                echo '<td style="text-align: center">
                                       <a href="view_prod.php?id='.$prod['id'].'" id="viewInfo">
                                            <i class="fas fa-plus-circle" style="font-size: 25px;"></i>
                                        </a>                    
                                     </td>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#prod_table').DataTable();
    });
</script>
<?php include "footer.php";?>