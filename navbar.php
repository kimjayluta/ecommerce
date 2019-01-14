<?php
session_start();
$loggedIn = true;
@$uid = '';
if (!$_SESSION){
    $loggedIn = false;
} else {
    $uid = $_SESSION['id'];
    $uType = $_SESSION['type'];

    if($uType == 1){
        header('location: ../admin/dashboard.php');
    }
}

?>
<nav class="navbar navbar-expand-lg " style="background-color:black;">
    <div class="container">
        <a href="index.php" class="navbar-brand txtColor txt" style="margin-right: 50rem;">
            <strong style="font-family: sans-serif;">TheClothing Co.</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">icon here</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link txtColor txt pr-0" href="cart.php"
                       style="padding-top: 10px">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span class="badge badge-pill badge-danger" style="font-size: 15px;margin-left: -10px;"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link txtColor txt pr-1" href="home.php">
                        <i class="fas fa-home" style="font-size: 23px"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle txtColor txt" href="" id="navbarDropdown"
                       role="button" data-toggle="dropdown">
                        <i class="fas fa-user fa-lg"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -9rem;top: 26px;">
                        <?php
                        if (!$loggedIn){
                            echo '<a class="dropdown-item" href="signup.php">Create new account</a>';
                            echo '<a class="dropdown-item" href="login.php">Login account</a>';
                        } else {
                            echo '<a class="dropdown-header dropdown-item" href="#">
                                        <h6 class="m-0">Hi, '.$_SESSION['usn'].'</h6>
                                  </a>';
                            echo '<div class="dropdown-divider"></div>';
                            echo '<a class="dropdown-item" href="#">Account settings</a>';
                            echo '<a class="dropdown-item" href="includes/account_function.php?logout">Sign out</a>';
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
