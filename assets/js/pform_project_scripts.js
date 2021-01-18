(function($) {

    'use strict';

    // No White Space
    $.validator.addMethod("noSpace", function(value, element) {
        if ($(element).attr('required')) {
            return value.search(/[a-zA-Z0-9À-žа-яА-ЯёЁα-ωΑ-Ω\s\u0621-\u064A\u0660-\u0669 ]/i) == 0;
        }

        return true;
    }, 'Please fill this empty field.');

    /*
    Assign Custom Rules on Fields
    */
    $.validator.addClassRules({
        'form-control': {
            noSpace: true
        }
    });

    $('.pform-contact-form').each(function() {
        $(this).validate({
            submitHandler: function(form) {

                var $form = $(form),
                    $messageSuccess = $form.find('.pform-contact-form-success'),
                    $messageError = $form.find('.pform-contact-form-error'),
                    $submitButton = $(this.submitButton),
                    $errorMessage = $form.find('.mail-error-message'),
                    submitButtonText = $submitButton.val();

                $submitButton.val($submitButton.data('loading-text') ? $submitButton.data('loading-text') : 'Loading...').attr('disabled', true);

                // Fields Data
                var formData = $form.serializeArray(),
                    data = {};

                $(formData).each(function(index, obj) {
                    data[obj.name] = obj.value;
                });

                // Ajax Submit
                $.ajax({
                         url:   PForm_msg_ajax_object.ajax_url,
                         type: 'POST',
                         data: {
                          'action': 'PForm_my_action_name',
                          'PForm_Table_Data' : data,
                         },
                      }).always(function(data, textStatus, jqXHR) {

                    data = $.parseJSON(data);
                    $errorMessage.empty().hide();

                    if (data.result == 'success') {

                        $messageSuccess.removeClass('d-none');
                        $messageError.addClass('d-none');

                        // Reset Form
                        $form.find('.form-control')
                            .val('')
                            .blur()
                            .parent()
                            .removeClass('has-success')
                            .removeClass('has-danger')
                            .find('label.error')
                            .remove();

                        if (($messageSuccess.offset().top - 80) < $(window).scrollTop()) {
                            $('html, body').animate({
                                scrollTop: $messageSuccess.offset().top - 80
                            }, 300);
                        }

                        $form.find('.form-control').removeClass('error');

                        $submitButton.val(submitButtonText).attr('disabled', false);

                        return;

                    } else if (data.result == 'error' && typeof data.error !== 'undefined') {
                        $errorMessage.html(data.errorMessage).show();
                    } else {
                        $errorMessage.html(data.responseText).show();
                    }

                    $messageError.removeClass('d-none');
                    $messageSuccess.addClass('d-none');

                    if (($messageError.offset().top - 80) < $(window).scrollTop()) {
                        $('html, body').animate({
                            scrollTop: $messageError.offset().top - 80
                        }, 300);
                    }

                    $form.find('.has-success')
                        .removeClass('has-success');

                    $submitButton.val(submitButtonText).attr('disabled', false);

                });
            }
        });
    });

}).apply(this, [jQuery]);