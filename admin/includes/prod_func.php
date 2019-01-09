<?php
include_once "../../includes/db.php";
@$id = $_GET['id'];
// Add product
if (isset($_POST['btn-add']) && $id == ''){
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_qty = $_POST['prod_qty'];
    $prod_cat = $_POST['prod_cat'];
    $prod_desc = $_POST['prod_desc'];

    if (isset($prod_name,$prod_price,$prod_qty,$prod_cat,$prod_desc)){
        if (isset($_FILES['prod_img'])){
            // Get the name of the file
            $img_name = $_FILES['prod_img']['name'];
            //Change to a new name
            $new_name = time().$img_name;
            // image file directory
            $target = "img/".basename($new_name);
            // Insert data
            $sql = "INSERT INTO `product`(`prod_cat`,`name`,`descrip`,`price`,`qty`,`date_added`,`prod_img`)
                    VALUES ('$prod_cat','$prod_name','$prod_desc','$prod_price','$prod_qty',NOW(),'$new_name')";
            $query = mysqli_query($conn,$sql);
            if ($query){
                $query = mysqli_query($conn,"UPDATE `categorie` SET `prod_qty`= prod_qty + 1 WHERE `id`='$prod_cat'");
                //move file to image directory
                move_uploaded_file($_FILES['prod_img']['tmp_name'], $target);
                header('location: ../add_prod.php?success');
            }
        }
    }
}
// Edit product data
if (isset($_POST['btn-add'],$_GET['id']) && $id !== ''){
    $new_name = $_POST['prod_name'];
    $new_price = $_POST['prod_price'];
    $new_qty = $_POST['prod_qty'];
    $new_cat = $_POST['prod_cat'];
    $new_desc = $_POST['prod_desc'];
    $prod_id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT `prod_cat` FROM `product` WHERE `id`='$id'");
    $oldCategory  = mysqli_fetch_array($query);

    if ($new_cat !== $oldCategory[0]){
        // Kapag bago ang value kang category babawasan ta su qty kang dating category tapos dadagdagan su bagong category
        // bawasan su dating qty
        $sql = "UPDATE `categorie` SET `prod_qty`= prod_qty - 1 WHERE `id`='$oldCategory[0]'";
        $query = mysqli_query($conn,$sql);
        if ($query){
            // dagdagan su bagong qty
            mysqli_query($conn, "UPDATE `categorie` SET `prod_qty` = prod_qty + 1 WHERE `id`='$new_cat'");
        } else {
            echo $sql;
        }
    }

    if (isset($new_name,$new_price,$new_qty,$new_qty,$new_cat,$new_desc)) {

        // Update data
        $sql = "UPDATE `product` SET `prod_cat`='$new_cat',`name`='$new_name',
                `descrip`='$new_desc',`price`='$new_price',`qty` = '$new_qty',
                `date_added`= NOW() WHERE `id`='$prod_id'";
        mysqli_query($conn, $sql);

        header('location: ../view_prod.php?id='.$prod_id.'');
    }





}
// Update photo
if (isset($_GET['pid'],$_FILES['newImage'])){
    $pid = $_GET['pid'];
    // query the old name of image
    $oldImg = mysqli_query($conn, "SELECT `prod_img` FROM `product` WHERE `id`='$pid'");
    $oldImgName = mysqli_fetch_array($oldImg);
    // Find the file in the directory
    $file = 'img/'.$oldImgName[0];
    // Delete the image in the directory
    unlink($file);

    $newImg = $_FILES['newImage']['name'];
    $newImgName = time().$newImg;
    $target = "img/".basename($newImgName);

    $query = mysqli_query($conn, "UPDATE `product` SET `prod_img`='$newImgName' WHERE `id`='$pid'");

    if ($query){
        move_uploaded_file($_FILES['newImage']['tmp_name'], $target);
        header('location: ../view_prod.php?id='.$pid.'');
    }
}

//Delete product
if (isset($_POST['deleteProd'])){
    $deleteID = $_POST['deleteId'];

    // query the old name of image
    $prodData = mysqli_query($conn, "SELECT * FROM `product` WHERE `id`='$deleteID'");
    $data = mysqli_fetch_array($prodData);

    // Category ID
    $catID = $data['prod_cat'];

    // Find the file in the directory
    $file = 'img/'.$data['prod_img'];

    // Delete the image in the directory
    unlink($file);

    $sql = "DELETE FROM product WHERE id='$deleteID'";
    $query = mysqli_query($conn,$sql);
    if ($query){
        $query = mysqli_query($conn,"UPDATE `categorie` SET `prod_qty`= prod_qty - 1 WHERE `id`='$catID'");

        header('location: ../product.php?delID='.$deleteID.'');
    }
}