<?php
include "./header.php";
include "./navbar.php";
$loggedIn = false;
$loginFromCart = false;

if ($_SESSION){
    $loggedIn = true;
}
?>
<title>Login</title>
<style>
    .cd2{
        padding: 10px 25px 0 0;
    }
    .input{
        border: 0;
        padding:0;
        border-bottom: 1px solid #b0bec5;
        border-radius: 0;
        width: 406px;
    }
    .input:focus{
        border-bottom: 1px solid black;
        box-shadow: none;
    }
    .form-group{
        margin-bottom: 2.5rem;
    }
    .buton{
        background-color: black;
        color: white;
    }
    .buton:hover{
        background-color: #343a40;
    }
</style>
<section>
    <div class="container mt-4" style="padding: 3rem 20rem 0 20rem;">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col">
                        <h5>Already Registered ? </h5>
                       <small>If you have an account, sign in with your username</small>
                   </div>
                   <div class="col-2 cd2">
                       <i class="fas fa-user-cog fa-2x" style="float: right"></i>
                   </div>
               </div>
           </div>
           <div class="card-body">
               <form id="loginForm">
                   <div id="error"></div>
                   <div class="form-group row" style="margin-top: 13px;">
                       <label for="username" class="col-sm-1 col-form-label" style="text-align: right;padding: 0;">
                           <i class="fas fa-user"></i>
                       </label>
                       <div class="col-sm-10">
                           <input type="text" class="form-control input" id="username" placeholder="Username">
                       </div>
                   </div>
                   <div class="form-group row">
                       <label for="password" class="col-sm-1 col-form-label"style="text-align: right;padding: 0;">
                           <i class="fas fa-unlock"></i>
                       </label>
                       <div class="col-sm-10">
                           <input type="password" class="form-control input" id="password" placeholder="Password">
                       </div>
                   </div>
                   <button type="submit" class="btn buton w-100" id="btn-submit">Sign in</button>
                    <div class="form-group mt-1 row" style="margin-bottom: 0">
                        <div class="col-sm-8">
                            <small><a href="signup.php"> Don't have account yet? Create here! </a></small>
                        </div>
                        <div class="col" style="text-align: right">
                            <small><a href="#"> Forgot Password ? </a></small>
                        </div>
                    </div>
               </form>
           </div>
       </div>
    </div>
</section>
<script src="js/account.js"></script>
<script type="text/javascript" src="js/count_prod.js"></script>

<?php include "./footer.php"?>