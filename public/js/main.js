$(document).ready(function () {
    $(document).on('focus', '[data-focus-role]', function () {
        $('[data-focus-target ="' + $(this).data('focus-role') + '"]').slideDown();
    });
    $.each($('[data-role="select2"]'), function () {
        $this = $(this);
        $this.select2({
            width: '100%',
            placeholder: $this.data('placeholder'),
            minimumResultsForSearch: 10
        });
    });
});

function showErrors($form, data) {
    var mark_error = 'has-error';
    var err_block_selector = '.error-block';

    var error_fields = new Array();
    $.each(data, function (k, i) {
        error_fields.push('#' + k);
    });
    error_fields = error_fields.join(',');
    $.each($form.find('.' + mark_error), function (k, i) {
        if ($(this).find(error_fields).length == 0) {
            $(this).find(err_block_selector).slideUp(function () {
                $(this).html('')
            });
            $(this).removeClass(mark_error);
        }
    });
    $.each(data, function (k, i) {
        var $field = $form.find('#' + k + '_error');
        $field.parents('.form-group').first().addClass(mark_error);
        $field.html(i).slideDown();
    });
}


// Отправить Ajax
function sendAjax(data) {
    if (!data.url) {
        console.log(data);
        alert('Не задан url!');
        return false;
    }
    var def_data = {
        type: 'post',
        async: 'false',
        dataType: 'json',
        data: {},
        url: '/',
        beforeSend: function () {

        },
        success: function () {

        },
        complete: function () {

        },
        error: function (data) {
        }
    };
    var data = $.extend(def_data, data);
    jQuery.ajax(data);
}
