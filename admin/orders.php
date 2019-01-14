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
            <li class="active">
                <a href="orders.php">Orders</a>
            </li>
            <li>
                <a href="costumer.php">Costumers</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
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
        <!--Content here-->
        <div class="container">
            <div class="card cd">
                <div class="card-header pb-0 pt-3" style="background-color: transparent;border: 0;">
                    <div class="row">
                        <div class="col">
                            <h3 id="order_title">Pending orders</h3>
                        </div>
                        <div class="col" style="text-align: right">
                            <div class="dropdown">
                                <button class="btn btn-dark  dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-4"><i class="fas fa-filter"></i></span>
                                </button>
                                <div class="dropdown-menu mr-4" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="javascript:void(0)" id="pending">Pending</a>
                                    <a class="dropdown-item" href="javascript:void(0)" id="complete">Completed</a>
                                    <a class="dropdown-item" href="javascript:void(0)" id="cancel">Canceled</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="msg">

                    </div>
                    <table class="table" id="order_table">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Date</th>
                                <th scope="col">Contact number</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="orderTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        // Filter function
        function getPendingOrder() {
            $.ajax({
                url: 'includes/orderpage_func.php',
                method: 'post',
                data: {pend:1,getOrder:1},
                success: function (data) {
                    $('#orderTable').html(data);
                    $('#order_title').text('Pending orders');
                }
            })
        }

        // Data-table
        $('#order_table').DataTable();

        // Get order by pending category
        getPendingOrder();

        // Filter function
        $('#pending').on('click', function () {
            getPendingOrder();
        });

        $('#complete').on('click', function () {
            $.ajax({
                url: 'includes/orderpage_func.php',
                method: 'post',
                data: {comp:1,getOrder:1},
                success: function (data) {
                    $('#orderTable').html(data);
                    $('#order_title').text('Complete orders');
                }
            })
        });

        $('#cancel').on('click', function () {
            $.ajax({
                url: 'includes/orderpage_func.php',
                method: 'post',
                data: {canc:1,getOrder:1},
                success: function (data) {

                    $('#orderTable').html(data);
                    $('#order_title').text('Canceled orders');
                }
            })
        });

        // Complete function
        $('#orderTable').on('click','.compBtn', function () {
            const order_id = $(this).parents('tr').find('.order_id').data('id');
            $.ajax({
                url: 'includes/orderpage_func.php',
                method: 'post',
                data:{approve:1,order_id:order_id},
                success: function (data) {

                    getPendingOrder();
                    $('#msg').html(data);
                }
            })
        });

        $('#orderTable').on('click','.cancBtn', function () {
            const order_id = $(this).parents('tr').find('.order_id').data('id');
            $.ajax({
                url: 'includes/orderpage_func.php',
                method: 'post',
                data:{cancel:1,order_id:order_id},
                success: function (data) {
                    getPendingOrder();
                    $('#msg').html(data);
                }
            })
        })
    });
</script>
<?php include "footer.php";?>