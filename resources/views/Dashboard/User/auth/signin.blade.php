@extends('Dashboard.layouts.master2')

@section('css')
<!-- Sidemenu-responsive-tabs css -->
<link href="{{ URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet">
<style>
    .loginform {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{ URL::asset('Dashboard/img/media/login.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex">
                                    <a href="{{ url('/' . $page='index') }}">
                                        <img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo">
                                    </a>
                                    <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                </div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>Welcome back!</h2>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">حدد طريقة الدخول</label>
                                            <select class="form-control" id="sectionChooser">
                                                <option value="null" disabled selected>اختار من القائمة</option>
                                                <option value="user">مريض</option>
                                                <option value="admin">أدمن</option>
                                            </select>
                                        </div>

                                        <!-- User Login Form -->
                                        <div class="loginform" id="user-login">
                                            <h5 class="font-weight-semibold mb-4">الدخول كمستخدم</h5>
                                            <form method="POST" action="{{ route('login.user') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" placeholder="Enter your email" type="text" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" placeholder="Enter your password" type="password" name="password" required autofocus>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                                <button class="btn btn-main-primary btn-block" type="submit">Sign In</button>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="#">Forgot password?</a></p>
                                                <p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
                                            </div>
                                        </div>

                                        <!-- Admin Login Form -->
                                        <div class="loginform" id="admin-login">
                                            <h5 class="font-weight-semibold mb-4">الدخول كأدمن</h5>
                                            <form method="POST" action="{{ route('login.admin') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" placeholder="Enter your email" type="text" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" placeholder="Enter your password" type="password" name="password" required autofocus>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                                <button class="btn btn-main-primary btn-block" type="submit">Sign In</button>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="#">Forgot password?</a></p>
                                                <p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
                                            </div>
                                        </div>
                                    </div> <!-- End main-signup-header -->
                                </div> <!-- End card-sigin -->
                            </div>
                        </div>
                    </div>
                </div> <!-- End container -->
            </div>
        </div> <!-- End content half -->
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $(".loginform").hide(); // Hide all login forms initially

    $("#sectionChooser").change(function() {
        var selectedValue = $(this).val();
        $(".loginform").hide(); // Hide all forms

        if (selectedValue === "user") {
            $("#user-login").show(); 
        } else if (selectedValue === "admin") {
            $("#admin-login").show(); 
        }
    });
});
</script>
@endsection
