<?php
include "../../includes/db.php";


if (isset($_POST['countOrder'])){
    $sql = "SELECT COUNT(*) AS count_order FROM orders_info";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $count_of_order = $row['count_order'];

    echo $count_of_order;
    exit;
}

if (isset($_POST['countProduct'])){
    $sql = "SELECT COUNT(*) AS count_product FROM product WHERE qty > 0";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $count_of_product = $row['count_product'];

    echo $count_of_product;
    exit;
}

if (isset($_POST['countCustomer'])){
    $sql = "SELECT COUNT(*) AS count_customer FROM users WHERE type = '0'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $count_of_customer = $row['count_customer'];

    echo $count_of_customer;
    exit;
}