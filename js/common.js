/**
 * Created by Steve on 9/24/14.
 */
$(document).ready(function() {

    $('.m-fade').fadeIn(400);
    $('.m-show').show(600);

    var url = document.URL;
    if (url.indexOf("result") > -1 || url.indexOf("scorecard") > -1)
    {
        $('.btn-print').show(400);
    }

    (function() {
        var request;
        var formSuccess = false;
        $("#form-submit").submit(function (event) {
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

            request.done(function (response, textStatus, jqXHR) {
                if (response == 'success') {
                    formSuccess = true;
                    $("#formModal").modal('hide');
                }
                else {
                    $("#div-error p").html(response).parent().show(400);
                }
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
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
        });
    })();

    (function() {
        var beforePrint = function() {
            $('.col-md-6').removeClass('col-md-6').addClass('col-xs-6');
        };
        var afterPrint = function() {
            $('.col-xs-6').removeClass('col-xs-6').addClass('col-md-6');
        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(function(mql) {
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
    })();
});