$(document).ready(function () {
    $(document).click(function(event) {
        if ($(event.target).closest("#comment-form").length || $(event.target).closest("#open-comment-form").length) return;
        $("#comment-form").fadeOut();
        event.stopPropagation();
    });
    $('#open-comment-form').click(function () {
        $('#comment-form').fadeIn('fast');
    });

    $('#user-form').submit(function () {
        var $this = $(this);
        var url = $(this).attr('action');
        var data = $(this).serialize();
        sendAjax({
            url: url,
            data: data,
            beforeSend: function () {
            },
            success: function (data) {
                if (data.done) {
                    showErrors($this, []);
                    saveProject();
                }
                showErrors($this, data.errors);
            },
            error: function (data) {
                showErrors($this, data.responseJSON);
                // Render the errors with js ...
            }
        });
        return false;
    });

    $('#project-form').submit(function () {
        var $this = $(this);
        var url = $(this).attr('action');
        var data = $(this).serialize();
        sendAjax({
            url: url,
            data: data,
            beforeSend: function () {
            },
            success: function (data) {
                if (data.done) {
                    if (data.auth) {
                        showErrors($this, []);
                        successPost(data);
                    } else {
                        showErrors($this, []);
                        setStep2();
                    }
                }
            },
            error: function (data) {
                showErrors($this, data.responseJSON);
                // Render the errors with js ...
            }
        });
        return false;
    });
});
function saveProject() {
    sendAjax({
        url: $('#project-form').data('action-save'),
        data: {
            _token: $('#project_form').find('[name = "_token"]').val(),
        },
        beforeSend: function () {
        },
        success: function (data) {
            if (data.done)
                successPost(data);
        },
        error: function (data) {
            // Render the errors with js ...
        }
    });
}
function setStep2() {
    $('#wrapper-project-form').fadeOut(function () {
        $('#wrapper-register-form').fadeIn();
    });
    $('#steps-info .progress-bar').addClass('step2');
}

function successPost(data) {
    $('#group-forms').fadeOut(function () {
        $(this).html('<h2 class="text-center"><strong>' + data.message + '</strong></h2>');
        var $ul = $('<ul/>');
        $.each(data.model_data, function (k, i) {
            $ul.append(
                $('<li/>').html(k + ': ' + i)
            );
        });
        $(this).append(
            $('<h3/>').html('Project data:'),
            $ul
        );
        $(this).fadeIn();
    })
}