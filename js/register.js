$(document).ready(function () {
    $('#form-register').on("submit", function () {
        let usn  = $('#username').val();
        let pwd  = $('#password').val();
        let cpwd = $('#confPass').val();
        let firstName = $('#fn').val();
        let lastName  = $('#ln').val();
        let address   = $('#address').val();
        let contactNum   = $('#contactNum').val();
        let data = "usn="+ usn + "&pwd=" + pwd + "&cpwd=" + cpwd + "&firstName=" + firstName+ "&lastName="
            + lastName+ "&address=" + address + "&contactNum=" + contactNum;
        // Checking all fields if there's empty value
        if(usn === '' || pwd === '' || cpwd === '' || firstName === '' || lastName === '' || address === '' || contactNum === ''){
            error("Please fill up all fields.");
            return false;
        }
        // Checking length of username
        if(usn.length < 6 || usn.length > 32){
            error("Username must be 6-32 characters only.");
            return false;
        }
        // Checking if username is a valid characters
        if (!usn.match(/^[a-z\d_]{0,}$/i)) {
            console.log(usn);
            error("Username is invalid.");
            return false;
        }
        // Checking length of password
        if(pwd.length < 6 || pwd.length > 32){
            error("Password error.");
            return false;
        }
        // Checking if password and confirm password matches
        if(pwd !== cpwd){
            error("Password mismatch.");
            return false;
        }
        // Checking the length of first name
        if(firstName.length < 1 || firstName > 32 ){
            error("First name must be 1-32 characters only.");
            return false;
        }
        // Checking the length of last name
        if(lastName.length < 1 || lastName > 32 ){
            error("Last name must be 1-32 characters only.");
            return false;
        }
        // Checking if name is a valid characters
        if(!firstName.match(/^[a-zA-Z0-9_ ]*$/i)){
            error("First name is invalid.");
            return false;
        }
        // Checking if name is a valid characters
        if(!lastName.match(/^[a-z]{0,}$/i)){
            error("Last name is invalid.");
            return false;
        }
        // Checking the length of address
        if(address.length  < 1 || address.length > 60){
            error("Address must be 1-60 characters only.");
            return false;
        }
        //Checking the length of contact number
        if(contactNum.length < 5 || contactNum.length > 13){
            error("Contact number is to long.");
            return false
        }
        if(!contactNum.match(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g)){
            error("Contact number is invalid.");
            return false;
        }
        $.ajax({
            method: "post",
            url: "includes/register.php?",
            data: data,
            success: function(data){
                if(data === 'exist'){
                    error("Username is already taken");
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