<?php
$conn = mysqli_connect('localhost','root','','o_shop');

if(mysqli_connect_error()){
    echo "Failed to connect into database " . mysqli_connect_error();
}