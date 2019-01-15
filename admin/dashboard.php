<?php
include "header.php";
include "../includes/db.php";
$usn = $_SESSION['usn'];

?>
<title>Dashboard</title>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>TheClothing Co.</h4>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
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
                    <li>
                        <a href="product.php">Product list</a>
                    </li>
                    <li>
                        <a href="category.php">Categories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports</a>
                <ul class="collapse list-unstyled" id="reports">
                    <li>
                        <a href="#">Sales report</a>
                    </li>
                    <li>
                        <a href="#">Invoices</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span>Settings</span>
                </a>
                <ul class="collapse list-unstyled" id="settings">
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
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                Hi, <span> <?php echo $usn;?></span>
                                <i class="fas fa-user-circle fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Content here-->
        <div class="container">
            <div class="row">
                <!-- Revenue -->
                <div class="col">
                    <div class="card cd">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-2">
                                   <i class="fas fa-hand-holding-usd fa-4x"></i>
                               </div>
                               <div class="col-10" style="text-align: right">
                                   <h6 class="text-muted">Revenue</h6>
                                   <div id="revenue_count">

                                   </div>
                               </div>
                           </div>
                       </div>
                        <div class="card-footer" style="text-align: center;background-color: transparent">
                            <p class="text-muted">Total Revenue</p>
                        </div>
                    </div>
                </div>

                <!-- Orders -->
                <div class="col">
                    <div class="card cd">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-cart-plus fa-4x"></i>
                                </div>
                                <div class="col-10" style="text-align: right">
                                    <h6 class="text-muted">Orders</h6>
                                    <div id="order_count">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: center;background-color: transparent">
                            <p class="text-muted">Total Orders</p>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="col">
                    <div class="card cd">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-box-open fa-4x"></i>
                                </div>
                                <div class="col-10" style="text-align: right">
                                    <h6 class="text-muted" >Products</h6>
                                    <div id="product_count">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: center;background-color: transparent">
                            <p class="text-muted">Available Products</p>
                        </div>
                    </div>
                </div>

                <!-- Costumers -->
                <div class="col">
                    <div class="card cd">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-users fa-4x"></i>
                                </div>
                                <div class="col-10" style="text-align: right">
                                    <h6 class="text-muted">Costumers</h6>
                                    <div id="customer_count">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: center;background-color: transparent">
                            <p class="text-muted">Registered customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Charts-->
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col">
                    <!-- Line graph -->
                    <div class="card cd p-4">
                        <canvas id="lineGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        function count_order(){
            $.ajax({
                url: 'includes/dashboard_func.php',
                method: 'post',
                data: {countOrder:1},
                success: function (data) {
                    $('#order_count').html('<h5>'+ data + '</h5>');
                }
            })
        }

        function count_product(){
            $.ajax({
                url: 'includes/dashboard_func.php',
                method: 'post',
                data: {countProduct:1},
                success: function (data) {
                    $('#product_count').html('<h5>'+ data + '</h5>');
                }
            })
        }

        function count_customer(){
            $.ajax({
                url: 'includes/dashboard_func.php',
                method: 'post',
                data: {countCustomer:1},
                success: function (data) {
                    $('#customer_count').html('<h5>'+ data + '</h5>');
                }
            })
        }

        function count_revenue(){
            $.ajax({
                url: 'includes/dashboard_func.php',
                method: 'post',
                data: {countRevenue:1},
                success: function (data) {
                    $('#revenue_count').html('<h5> &#8369; '+ data + '</h5>');
                }
            })
        }

        count_order();
        count_product();
        count_customer();
        count_revenue();
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<!-- Chart Js -->
<script src="js/chart.js"></script>
<?php include "footer.php";?>