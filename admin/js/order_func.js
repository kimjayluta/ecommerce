$(document).ready(function () {

    // Filter function
    function getPendingOrder() {
        $.ajax({
            url: 'includes/orderpage_func.php',
            method: 'post',
            data: {pend:1,getOrder:1},
            success: function (data) {
                $('#orderTable').html(data);
                $('#order_title').text('Pending orders');
            }
        })
    }

    // Data-table
    $('#order_table').DataTable();

    // Get order by pending category
    getPendingOrder();

    // Filter function
    $('#pending').on('click', function () {
        getPendingOrder();
    });

    $('#complete').on('click', function () {
        $.ajax({
            url: 'includes/orderpage_func.php',
            method: 'post',
            data: {comp:1,getOrder:1},
            success: function (data) {
                $('#orderTable').html(data);
                $('#order_title').text('Complete orders');
            }
        })
    });

    $('#cancel').on('click', function () {
        $.ajax({
            url: 'includes/orderpage_func.php',
            method: 'post',
            data: {canc:1,getOrder:1},
            success: function (data) {

                $('#orderTable').html(data);
                $('#order_title').text('Canceled orders');
            }
        })
    });

    // Complete function
    $('#orderTable').on('click','.compBtn', function () {
        const order_id = $(this).parents('tr').find('.order_id').data('id');
        $.ajax({
            url: 'includes/orderpage_func.php',
            method: 'post',
            data:{approve:1,order_id:order_id},
            success: function (data) {

                getPendingOrder();
                $('#msg').html(data);
            }
        })
    });
    // Cancel function
    $('#orderTable').on('click','.cancBtn', function () {
        const order_id = $(this).parents('tr').find('.order_id').data('id');
        $.ajax({
            url: 'includes/orderpage_func.php',
            method: 'post',
            data:{cancel:1,order_id:order_id},
            success: function (data) {
                getPendingOrder();
                $('#msg').html(data);
            }
        })
    })

    // Pending btn function
    $('#orderTable').on('click','.pendBtn', function () {
        const order_id = $(this).parents('tr').find('.order_id').data('id');
        $.ajax({
            url: 'includes/orderpage_func.php',
            method: 'post',
            data:{pending:1,order_id:order_id},
            success: function (data) {
                getPendingOrder();
                $('#msg').html(data);
            }
        })
    })
});
    