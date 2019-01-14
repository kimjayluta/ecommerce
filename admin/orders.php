<?php include "header.php";?>
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
                            <h3 >Pending orders</h3>
                        </div>
                        <div class="col" style="text-align: right">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-4">View by</span>
                                </button>
                                <div class="dropdown-menu mr-4" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Completed</a>
                                    <a class="dropdown-item" href="#">Processing</a>
                                    <a class="dropdown-item" href="#">Canceled</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Order #01</td>
                                <td>@kimjayluta</td>
                                <td>12/17/18</td>
                                <td>09755197836</td>
                                <td>1,000</td>
                                <td>
                                    <span style="display: inline;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#checkModal">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#cancelModal">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Check Modal -->
<div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Complete order: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure this order is already completed ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Cancel modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancel order:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to cancel this order ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#order_table').DataTable();
    });
</script>

<?php include "footer.php";?>