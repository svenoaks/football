/**
 * Created by Steve on 9/24/14.
 */
$(document).ready(function() {

    var request;
// bind to the submit event of our form
    $("#ss-form").submit(function(event){
        $("#div-error").hide();
        // abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);
        // let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");
        // serialize the data in the form
        var serializedData = $form.serialize();

        // let's disable the inputs for the duration of the ajax request
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // fire off the request to /form.php
        request = $.ajax({
            url: "../submit.php",
            type: "post",
            data: serializedData
        });

        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            if (response == 'success') {
                window.location.replace("../news.php?picked=true");
            }
            else {
                $("#div-error p").html(response).parent().show(400);
                //$("#div-error").show(200);
            }
        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            $("#div-error p").html("There was a problem submitting, please try again.").parent().show(400);
        });

        // callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // reenable the inputs
            $inputs.prop("disabled", false);
        });

        // prevent default posting of form
        event.preventDefault();
    });
});