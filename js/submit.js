/**
 * Created by Steve on 9/24/14.
 */
$(document).ready(function() {
    $('#div-success').hide();

    var request;
    var formSuccess = false;
    $("#form-submit").submit(function(event){
        $("#div-error").hide();
        if (request) {
            request.abort();
        }
        var $form = $(this);
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $form.serialize();

        $inputs.prop("disabled", true);

        request = $.ajax({
            url: "submit.php",
            type: "post",
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR){
            if (response == 'success') {
                formSuccess = true;
                $("#formModal").modal('hide');
            }
            else {
                $("#div-error p").html(response).parent().show(400);
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            $("#div-error p").html("There was a problem submitting, please try again.").parent().show(400);
        });

        request.always(function () {

            $inputs.prop("disabled", false);
        });

        event.preventDefault();
    });
    $('#formModal').on('hidden.bs.modal', function (e) {
        if (formSuccess) $('#div-success').slideDown(400);
        formSuccess = false;
    })
});