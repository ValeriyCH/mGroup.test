@extends('layouts.main')
@section('content')
    <div class="white-bg container col-lg-6 login-wrapper">
        <h1 class="text-uppercase text-center"><strong>Login form</strong></h1>

        <?php echo BootForm::open(['store' => 'auth.login.post', 'id' => 'login-form']); ?>
        <?php echo BootForm::email('email');?>
        <?php echo BootForm::password('password');?>
        <?php echo BootForm::submit('Login',['class' => 'btn btn-primary btn-lg btn-block submit-btn text-uppercase user-submit', 'wrapper' => ['class'=>'text-center']]); ?>
        <?php echo BootForm::close(); ?>
    </div>
@stop