<?php
include_once 'db.php';
session_start();
@$usn = $_POST['usn'];
@$pwd = $_POST['pwd'];
$query = mysqli_query($conn,"SELECT * FROM accounts WHERE usn='$usn'");
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