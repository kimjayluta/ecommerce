<?php
include "./header.php";
include "./includes/db.php";
include  "navbar.php";

$loggedIn = true;

if (!$_SESSION){
    $loggedIn = false;
}
?>
<title>Sign in</title>
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
    <div class="container mb-5" style="padding: 3rem 15rem 0 15rem;">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3>Create your Account </h3>
                        <small>We will save the details you provide in order to facilitate your purchase/s.</small>
                        <br />
                        <small>Fill out the following form in order to register.</small>
                    </div>
                    <div class="col-2 cd2">
                        <i class="fas fa-user-edit fa-3x" style="float: right"></i>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="form-register">
                    <div id="error"></div>
                    <h5>USER INFORMATION</h5>
                    <hr style="opacity: 0">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="fn" id="fn" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="ln" id="ln" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="contactNumber" id="contactNum" placeholder="Contact Number">
                        <small class="text-muted">
                            Please provide your original phone number which we can contact, In order to advise you
                            on the updates of your order/s.
                        </small>
                    </div>
                    <h5>USER ACCOUNT</h5>
                    <hr style="opacity: 0">
                    <div class="form-group">
                        <input type="text" class="form-control"  name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="confPass" id="confPass" placeholder="Repeat Password">
                        </div>
                    </div>

                    <button type="submit" class="btn buton w-100" id="register">Sign in</button>
                    <small class="text-muted">
                        By clicking Sign up, you have read and agree to our
                        <a href="#">Terms, Data Policy, Cookies Policy.</a>
                    </small>
                    <br/>
                    <small>
                        <a href="login.php">Already have an account ? Click here!</a>
                    </small>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="js/account.js"></script>
<script type="text/javascript" src="js/count_prod.js"></script>

<?php include "./footer.php"?>