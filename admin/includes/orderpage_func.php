<?php
include '../../includes/db.php';

if (isset($_POST['getOrder'])){

    if (isset($_POST['pend'])){
        $sql = "SELECT * FROM orders_info WHERE ord_stat = 'pend'";
    }
    if (isset($_POST['comp'])){
        $sql = "SELECT * FROM orders_info WHERE ord_stat = 'comp'";
    }
    if (isset($_POST['canc'])){
        $sql = "SELECT * FROM orders_info WHERE ord_stat = 'canc'";
    }

    $query = mysqli_query($conn,$sql);
    $num = 1;
    while($row = mysqli_fetch_array($query)){
        echo
            '<tr>
            <th scope="row">'.$num++.'</th>
            <td>'.$row['id'].'</td>
            <td>'.$row['cust_name'].'</td>
            <td>'.$row['date_ord'].'</td>
            <td>'.$row['cnum'].'</td>
            <td>&#8369;  '.$row['total_ord'].'</td>
            <td>
                <span style="display: inline;">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" 
                            data-placement="top" title="Complete">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip"
                            data-placement="top" title="Cancel">
                        <i class="fas fa-ban"></i>
                    </button>
                </span>
            </td>
        </tr>';
    }
}


