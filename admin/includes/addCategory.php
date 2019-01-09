<?php
include_once '../../includes/db.php';
@$name = $_POST['name'];
@$id = $_POST['id'];
@$action = $_POST['action'];
@$deleteId = $_POST['deleteId'];
// Add or update data
if (isset($name)){
    if ($id == ""){
        $query = mysqli_query($conn,"INSERT INTO categorie(`name`,`prod_qty`) VALUES ('$name',0)");
        if ($query){
            header('location: ../category.php');
            exit();
        } else {
            exit(mysqli_error($conn));
        }
    } else {
        $query = mysqli_query($conn,"UPDATE categorie SET `name`='$name' WHERE `id`='$id'");
        if ($query){
            header('location: ../category.php');
            exit();
        } else {
            exit(mysqli_error($conn));
        }
    }
}

//Delete data function
if (isset($deleteId)){
    $query = mysqli_query($conn, "DELETE FROM `categorie` WHERE `id` = '$deleteId'");
    if ($query){
        header("Location: ../category.php");
        exit();
    } else {
        exit(mysqli_error($conn));
    }
}

// Getting the data to query in modal
if (isset($action) && isset($id)){
    $query = mysqli_query($conn, "SELECT * FROM categorie WHERE `id`='$id'");
    $result= mysqli_fetch_array($query);
    echo json_encode($result);
    mysqli_free_result($query);
    exit;
}


