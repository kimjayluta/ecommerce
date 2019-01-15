<?php
include "../../includes/db.php";
$sql = "SELECT  SUM(total_ord) AS total_order FROM orders_info GROUP BY month(date_ord)";

$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
    var_dump($row);
}
