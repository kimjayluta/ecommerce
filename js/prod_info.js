$(document).ready(
    //Quantity function add and minus
    function () {
        let j = jQuery;
        let minus = $('.qtyMinus');
        let plus = $('.qtyPlus');
        let currentVal = j('#qty').val();
        let defVal = 1;


        //Set default value
        $('#qty').val(defVal);
        $(minus).css("cursor", 'not-allowed');

        //Add button
        $(plus).on('click', function () {
            $('#qty').val(++defVal);
            // Enable - button when the value of #qty is greater than 1
            if(defVal > 1){
                $(minus).prop("disabled", false);
                $(minus).css("background-color", 'white');
                $(minus).css("cursor", 'pointer');

            }
            // To disable + button when the value of #qty is greater than 10
            if(defVal > 9){
                $(plus).prop("disabled", true);
                $(plus).css("background-color", 'whitesmoke');
                $(plus).css("cursor", 'not-allowed');
            }
        });

        //Minus button
        $(minus).on('click', function () {
            $('#qty').val(--defVal);
            // To disable - button when the value of #qty is equal to 1
            if(defVal > 0 && defVal < 2){
                $(minus).prop("disabled", true);
                $(minus).css("background-color", 'whitesmoke');
                $(minus).css("cursor", 'not-allowed');
            }
            // To disable + button when the value of #qty is less than 10
            if(defVal < 10){
                $(plus).prop("disabled", false);
                $(plus).css("background-color", 'white');
                $(plus).css("cursor", 'pointer');
            }
        });
    }
);