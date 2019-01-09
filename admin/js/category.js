$(document).ready(function () {
    // To Clear the modal when add button is clicked
    $('#addModal').on("hidden.bs.modal", function () {
        $(this).find(".modal-title").html("Add category:");
    });
    //Inserting data id in delete modal
    $(".deleteBtn").on('click', function () {
        const $edId = $(this).data("id");
        $("#deleteId").val($edId);
    });

    // getting the data and put it in modal
    $('.editBtn').on("click",function () {
        const dataId = $(this).data("id");
        $('#addModal').find(".modal-title").html("Loading...");

        $.post('includes/addCategory.php', {
            action: "getRecordInfo",
            id: dataId
        })
            .done(function (data) {
                const catInfo = JSON.parse(data);
                $("input#catId").val(dataId);
                $("input#cat_name").val(catInfo["name"]);
            })
            .fail(function () {
                alert("Error getting record data");
                $('#addModal').find(".modal-title").html("Edit Category:" + dataId + "Errror retrivieng data");
            })
            .always(function () {
                $('#addModal').find(".modal-title").html("Edit Category: " + dataId);
            })
    });
});