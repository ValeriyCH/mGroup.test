<?php echo BootForm::open(['model' => $project_model, 'data-action-save' => route('projects.store'), 'store' => 'projects.validate', 'id' => 'project-form']); ?>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<?php echo BootForm::text('name', null, false, ['placeholder' => 'What is your Project Name']);  ?>
@if (!Auth::check())
    <?php echo BootForm::radios('role_id', null, $lists_data['role_id']);?>
@endif
<?php echo BootForm::select('people_count', null, ['' => ''] + $lists_data['people_count'], null, ['data-role' => 'select2', 'data-placeholder' => 'Select number of members of team']);  ?>
<?php echo BootForm::select('talent_id', null, ['' => ''] + $lists_data['talent_id'], null, ['data-role' => 'select2', 'data-placeholder' => 'Select your talants']);  ?>
<?php echo BootForm::select('date_start', null, ['' => ''] + $lists_data['date_start'], null, ['data-role' => 'select2', 'data-placeholder' => 'Select your start timeline']);  ?>
<?php echo BootForm::submit(Auth::check() ? 'Start your project' : 'Next step', ['class' => 'btn btn-primary btn-lg btn-block submit-btn text-upper', 'wrapper' => ['class' => 'text-center']]); ?>
<?php echo BootForm::close(); ?>