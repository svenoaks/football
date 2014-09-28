/**
 * Created by Steve on 9/22/14.
 */
$(document).ready(function () {

    (function () {
        var request;
        $("#form-variables").submit(function (event) {
            if (request) {
                request.abort();
            }
            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");

            var serializedData = $form.serialize();

            $inputs.prop("disabled", true);

            request = $.ajax({
                url: "admin-submit-variables.php",
                type: "post",
                data: serializedData
            });

            request.done(function (response, textStatus, jqXHR) {
                $("#status").html(response);
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                $("#status").html("Problem with insertion");
            });

            request.always(function () {
                // reenable the inputs
                $inputs.prop("disabled", false);
            });

            // prevent default posting of form
            event.preventDefault();
        });
    })();

    (function () {
        var request;
        $("#m-form").submit(function (event) {
            if (request) {
                request.abort();
            }
            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");

            var serializedData = $form.serialize();

            $inputs.prop("disabled", true);

            request = $.ajax({
                url: "admin-submit-playing.php",
                type: "post",
                data: serializedData
            });

            request.done(function (response, textStatus, jqXHR) {
                $("#last").html("Last inserted: " + response);
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                $("#last").html("Problem with insertion");
            });

            request.always(function () {
                // reenable the inputs
                $inputs.prop("disabled", false);
            });

            // prevent default posting of form
            event.preventDefault();
        });
    })();
});