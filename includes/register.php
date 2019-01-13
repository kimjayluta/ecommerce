<?php
include_once "db.php";
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
