<?php
include "../../includes/db.php";
$sql = "SELECT  SUM(total_ord) AS total FROM orders_info GROUP BY month(date_ord) ORDER BY MONTH(date_ord)";
$data = array();
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
    $data[] = $row['total'];
}
echo json_encode($data);