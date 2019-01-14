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
            '<tr>'.
                '<th scope="row">'.$num++.'</th>'.
                '<td class="order_id" data-id="'.$row['id'].'">'.$row['id'].'</td>'.
                '<td>'.$row['cust_name'].'</td>'.
                '<td>'.$row['date_ord'].'</td>'.
                '<td>'.$row['cnum'].'</td>'.
                '<td>&#8369;  '.$row['total_ord'].'</td>'.
                '<td>';
                    if (!isset($_POST['pend'])){
                        echo
                            '<span style="display: inline;">'.
                                '<button type="button" class="btn btn-info btn-sm editBtn " data-toggle="tooltip" 
                                        data-placement="top" title="Edit info">'.
                                '<i class="fas fa-pen"></i>'.
                                '</button>'.
                            '</span>';
                    } else {
                        echo
                            '<span style="display: inline;">'.
                                '<button type="button" class="btn btn-success btn-sm compBtn mr-1" data-toggle="tooltip" 
                                    data-placement="top" title="Complete">'.
                                '<i class="fas fa-check"></i>'.
                                '</button>'.
                                '<button type="button" class="btn btn-danger btn-sm cancBtn" data-toggle="tooltip"
                                    data-placement="top" title="Cancel">'.
                                '<i class="fas fa-ban"></i>'.
                                '</button>'.
                            '</span>';
                    }
        echo    '</td>'.
            '</tr>';
    }
}

if (isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];

    if (isset($_POST['approve'])){
        $sql = "UPDATE orders_info SET ord_stat = 'comp' WHERE id = '$order_id'";
        $query = mysqli_query($conn, $sql);
        if ($query){
            echo
                '<div class="alert alert-success alert-dismissible fade show" role="alert">'.
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                '<span aria-hidden="true">&times;</span>'.
                '</button>'.
                '<strong>Success!</strong> Order successfully completed, order information will be in the complete orders category.'.
                '</div>';
        }
    }

    if (isset($_POST['cancel'])){
        $sql = "UPDATE orders_info SET ord_stat = 'canc' WHERE id = '$order_id'";
        $query = mysqli_query($conn, $sql);
        if ($query){
            echo
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                '<span aria-hidden="true">&times;</span>'.
                '</button>'.
                '<strong>Success!</strong> Order successfully canceled, order information will be in the canceled orders category.'.
                '</div>';
        }
    }
}


