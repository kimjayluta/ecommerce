$(document).ready(function () {
    $('#loginForm').on('submit', function () {
        let usn = $('#username').val();
        let pwd = $('#password').val();
        let data = "usn=" + usn + "&pwd="+ pwd;
        $.ajax({
            method:'post',
            url: 'includes/login_function.php',
            data: data,
            success: function (data) {
                if(data === 'usn'){
                    console.log('username error');
                   error('You\'re username is incorrect.');
                } else if (data === 'pwd'){
                    console.log('password error');
                    error('You\'re password is incorrect.');
                } else {
                    location.href = '../home.php';
                }
            }
        });
        return false;
    });
    function error(msg) {
        return $("#error").html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
            '<h6><strong>Error!</strong> '+ msg +'</h6>'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">&times;</span>'+
            '</button>'+
            '</div>')
    }

});