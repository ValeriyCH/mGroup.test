<div id='comment-form' style="display: none" class="white-bg">
    <div class="comment-info-block">
        <div class="group-images">
            <div class="img-wrap">
                <img src="{{asset('/upload/users/logo_user.jpg')}}" alt="">
            </div>
            <div class="img-wrap">
                <img src="{{asset('/upload/users/logo_user.jpg')}}" alt="">
            </div>
            <div class="img-wrap">
                <img src="{{asset('/upload/users/logo_user.jpg')}}" alt="">
            </div>
        </div>
        <div class="info-comment">
            <div class="title-small">Incubatio Team</div>
            <p>Ask us anything. We'd love to hear what brought you incubatio!</p>
        </div>
    </div>
    <div class="comment-form">
        <?php echo BootForm::open(['model' => $project_model, 'store' => 'projects.validate', 'id' => 'project_form']); ?>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <?php echo BootForm::text('comment', false);  ?>
        <?php echo BootForm::close(); ?>
    </div>
</div>
<button id="open-comment-form" class="btn open-ask-form-button"></button>
