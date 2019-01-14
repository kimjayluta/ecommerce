<?php
include "db.php";
// Sign up function
if (isset($_POST['register'])){
    session_start();

    @$usn = $_POST['usn'];
    @$pwd = $_POST['pwd'];
    @$firstName = $_POST['firstName'];
    @$lastName = $_POST['lastName'];
    @$address = $_POST['address'];
    @$contactNum = $_POST['contactNum'];
    @$type = 0;

    $query = mysqli_query($conn,"SELECT * FROM users WHERE usn ='$usn'");

    if(mysqli_num_rows($query) > 0){

        echo 'exist';
    } else {
        $query = mysqli_query($conn,"INSERT INTO `users` (`fn`, `ln`, `address`, `contact_num`, `usn`, `pwd`, `type`) 
                                        VALUES ('$firstName','$lastName','$address','$contactNum','$usn','$pwd','$type')");
        if ($query){

            $id = mysqli_insert_id($conn);

            $_SESSION['usn'] = $usn;
            $_SESSION['type'] = $type;
            $_SESSION['id'] = $id;

            setcookie( "usn", $usn, time() + (10 * 365 * 24 * 60 * 60) );
            setcookie( "type", $type, time() + (10 * 365 * 24 * 60 * 60) );
            setcookie( "id", $id, time() + (10 * 365 * 24 * 60 * 60) );

        } else {
            echo $query;
        }
    }
}

// Login function
if (isset($_POST['login'])){
    session_start();

    @$usn = $_POST['usn'];
    @$pwd = $_POST['pwd'];
    $query = mysqli_query($conn,"SELECT * FROM users WHERE usn='$usn'");
    $fetch = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0){
        if ($pwd == $fetch['pwd']){
            // Session insert
            $_SESSION['usn'] = $fetch['usn'];
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['type'] = $fetch['type'];

            // Cookie insert
            setcookie( "username", $fetch['usn'], time() + (10 * 365 * 24 * 60 * 60) );
            setcookie( "id", $fetch['id'], time() + (10 * 365 * 24 * 60 * 60) );
            setcookie( "type", $fetch['type'], time() + (10 * 365 * 24 * 60 * 60) );

        } else {
            echo 'pwd';
        }
    } else {
        echo 'usn';
    }
}

if (isset($_GET['logout'])){
    session_start();
    session_destroy();

    unset($_SESSION['id'],$_SESSION['type'],$_SESSION['usn']);

    if (isset($_COOKIE['usn'],$_COOKIE['id'],$_COOKIE['type'])){
        setcookie("usn",null, -1,'/');
        setcookie("id",null, -1,'/');
        setcookie("type",null, -1,'/');
    }

    header('location: ../index.php');

}