@extends('layouts.main')
@section('content')
    <div class="wrapper-form white-bg container col-lg-6 red">
        <h1 class="text-uppercase text-center"><strong>Create new project</strong></h1>
        <div class="text-center title">Tell us about your project</div>

        @if (!Auth::check())
            <div id="steps-info" class="text-center steps">
                @include('index._steps')
            </div>
        @endif

        <div id="group-forms">
            <?php /* project form */?>
            <div id="wrapper-project-form">
                @include('index._project_form')
            </div>

            @if (!Auth::check())
                <?php /* register form */?>
                <div id="wrapper-register-form" style='display:none'>
                    @include('index._register_form')
                </div>
            @endif
        </div>

        <div class="help-block text-center info">
            By signing up you agree to our <a href="{{route('static.privacy')}}">Privacy Policies</a>
        </div>
        <div class="footer-form row text-center help-block info">
            @if(!Auth::check())
                <div>Already Have an Account? <a href="{{route('auth.login')}}">Log in</a></div>
            @else
                <?php $user = Auth::user() ?>
                <div>
                    {{$user->getAttribute('name')}}, {{ $user->role->name}}
                    <a href="{{route('auth.logout')}}">Log out</a>
                </div>
            @endif
        </div>
    </div>

    <div class="comment-slider col-lg-4">
        @include('index._comments_slider')
    </div>

    <div class="ask-form">
        @include('index._ask_form')
    </div>
@stop