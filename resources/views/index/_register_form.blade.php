<?php echo BootForm::open(['model' => $user_model, 'store' => 'auth.register.ajax', 'id' => 'user-form']); ?>
<?php echo BootForm::text('name', false, null, ['placeholder' => $user_model->getAttributeLabel('name')]);  ?>
<?php echo BootForm::text('company_name', false, null, ['placeholder' => $user_model->getAttributeLabel('company_name')]);?>
<?php echo BootForm::email('email', false, null, ['placeholder' => $user_model->getAttributeLabel('email')]);?>
<?php echo BootForm::password('password', false, ['data-focus-role' => 'confirm_password', 'placeholder' => $user_model->getAttributeLabel('password')]);?>
<?php echo BootForm::password('password_confirmation', false, [ 'placeholder' => $user_model->getAttributeLabel('password_confirmation'),'wrapper' => ['data-focus-target' => 'confirm_password', 'style' => 'display:none;']]);?>
<?php echo BootForm::checkbox('accept_nda', null, 1, null, ['class' => 'left-icon']);?>
<div class="row delimiter">
</div>
<?php echo BootForm::checkbox('like_to_speak', null, 1, null, ['wrapper' => ['class'=>'text-center'], 'class' => 'right-icon']);?>
<?php echo BootForm::submit('Start your project',  ['class' => 'btn btn-primary btn-lg btn-block submit-btn text-uppercase user-submit', 'wrapper' => ['class'=>'text-center']]); ?>
<?php echo BootForm::close(); ?>