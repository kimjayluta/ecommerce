<?php
include "./header.php";
include "./includes/db.php";
include "./navbar.php";

$loggedIn = true;

if (!$_SESSION){
$loggedIn = false;
}
?>
<title>Home</title>
<link rel="stylesheet" href="css/home.css">
<section>
<div class="container mt-5">
    <div class="row">
        <div class="col-3" >
            <!-- Categories -->
            <div class="card mb-4 catCd">
                <div class="card-header txtColor catHed">
                    <h5 style="margin: 0;font-family: 'Open Sans', sans-serif;"><strong>Shop by Categories </strong></h5>
                </div>
                <div class="card-body" style="padding: 10px;">
                    <ul style="list-style: none;padding: 0" class="list-group list-group-flush">
                            <li class="list-group-item catList">
                                <a href="home.php" style="text-decoration: none" class="list item">All</a>
                            </li>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM `categorie`");
                                while ($row = mysqli_fetch_array($query)){
                                    echo '<li class="list-group-item catList">'.
                                            '<a href="javascript:void(0)" data-id="'.$row['id'].'" style="text-decoration: none" 
                                                class="list item">'.$row['name'].'</a>'.
                                        '</li>';
                                }
                            ?>
                    </ul>
                </div>
            </div>
            <!-- Gender -->
            <div class="card catCd">
                <div class="card-header txtColor catHed">
                    <h5 style="margin: 0;font-family: 'Open Sans', sans-serif;">
                        <strong> Shop by Gender </strong>
                    </h5>
                </div>
                <div class="card-body" style="padding: 10px">
                    <ul style="list-style: none;padding: 0" class="list-group list-group-flush">
                        <li class="list-group-item catList">
                            <a href="#" id="sixthItem" style="text-decoration: none;" class="list">Men</a>
                        </li >
                        <li class="list-group-item catList">
                            <a href="#" id="seventhItem" style="text-decoration: none;" class="list">Women</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--* Product -->
        <div class="col">
            <nav aria-label="breadcrumb" class="srch" style="margin-left: -16px;">
                <ol class="breadcrumb" style="background: white;">
                    <li class="breadcrumb-item active" aria-current="page">
                        <form class="form-inline" style="margin-right: 8px;">
                            <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search"
                                style="width: 46rem;">
                            <a href="#" style="width: 60px;">
                                <i class="fas fa-search ml-2" style="font-size: 27px;"></i>
                            </a>
                        </form>
                    </li>
                </ol>
            </nav>
            <!-- Digde nag a output ang mga product -->
            <div class="row mb-4" id="get_product">
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="msg">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Js -->
<script src="js/home.js"></script>
<?php include 'footer.php';?>