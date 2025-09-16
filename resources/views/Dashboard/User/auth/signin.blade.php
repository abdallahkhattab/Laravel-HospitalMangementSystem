@extends('Dashboard.layouts.master2')

@section('css')
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
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{ URL::asset('Dashboard/img/media/login.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>

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
                                        <h2>{{ __('Dashboard/login_trans.Welcome_back') }}</h2>

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
                                            <label for="exampleFormControlSelect1">{{ __('Dashboard/login_trans.Select_login_method') }}</label>
                                            <select class="form-control" id="sectionChooser">
                                                <option value="null" disabled selected>{{ __('Dashboard/login_trans.Choose_from_list') }}</option>
                                                <option value="patient">{{ __('Dashboard/login_trans.Patient') }}</option>
                                                <option value="admin">{{ __('Dashboard/login_trans.Admin') }}</option>
                                                <option value="doctor">{{ __('Dashboard/login_trans.Doctor') }}</option>
                                                <option value="ray">XRay Employee</option>
                                                <option value="laboratorie">laboratorie Employee</option>
                                                

                                                
                                            </select>
                                        </div>

                                        <!-- User Login -->
                                        <div class="loginform" id="user-login">
                                            <h5 class="font-weight-semibold mb-4">{{ __('Dashboard/login_trans.Login_as_user') }}</h5>
                                            <form method="POST" action="{{ route('login.user') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('Dashboard/login_trans.Email') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_email') }}" type="text" name="email" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Dashboard/login_trans.Password') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_password') }}" type="password" name="password" required>
                                                </div>
                                                <button class="btn btn-main-primary btn-block" type="submit">{{ __('Dashboard/login_trans.Sign_in') }}</button>
                                            </form>
                                        </div>

                                        <!-- Admin Login -->
                                        <div class="loginform" id="admin-login">
                                            <h5 class="font-weight-semibold mb-4">{{ __('Dashboard/login_trans.Login_as_admin') }}</h5>
                                            <form method="POST" action="{{ route('login.admin') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('Dashboard/login_trans.Email') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_email') }}" type="text" name="email" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Dashboard/login_trans.Password') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_password') }}" type="password" name="password" required>
                                                </div>
                                                <button class="btn btn-main-primary btn-block" type="submit">{{ __('Dashboard/login_trans.Sign_in') }}</button>
                                            </form>
                                        </div>

                                        <!-- Doctor Login -->
                                        <div class="loginform" id="doctor-login">
                                            <h5 class="font-weight-semibold mb-4">{{ __('Dashboard/login_trans.Login_as_doctor') }}</h5>
                                            <form method="POST" action="{{ route('login.doctor') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('Dashboard/login_trans.Email') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_email') }}" type="text" name="email" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Dashboard/login_trans.Password') }}</label>
                                                    <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_password') }}" type="password" name="password" required>
                                                </div>
                                                <button class="btn btn-main-primary btn-block" type="submit">{{ __('Dashboard/login_trans.Sign_in') }}</button>
                                            </form>
                                        </div>

                                             <!-- Ray Employee Login -->
                                             <div class="loginform" id="ray_employee-login">
                                                <h5 class="font-weight-semibold mb-4">{{ __('Dashboard/login_trans.Login_as_doctor') }}</h5>
                                                <form method="POST" action="{{ route('login.ray_employee') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ __('Dashboard/login_trans.Ray') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Ray') }}" type="text" name="email" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('Dashboard/login_trans.Password') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_password') }}" type="password" name="password" required>
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">{{ __('Dashboard/login_trans.Sign_in') }}</button>
                                                </form>
                                            </div>

                                            <div class="loginform" id="laboratorie_employee-login">
                                                <h5 class="font-weight-semibold mb-4">{{ __('Dashboard/login_trans.Login_as_ray_employee') }}</h5>
                                                <form method="POST" action="{{ route('login.laboratorie_employee') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ __('Dashboard/login_trans.Laboratorie') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Laboratorie') }}" type="text" name="email" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('Dashboard/login_trans.Password') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_password') }}" type="password" name="password" required>
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">{{ __('Dashboard/login_trans.Sign_in') }}</button>
                                                </form>
                                            </div>

                                            <div class="loginform" id="patient-login">
                                                <h5 class="font-weight-semibold mb-4">{{ __('Dashboard/login_trans.Login_as_patient') }}</h5>
                                                <form method="POST" action="{{ route('login.patient') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ __('Dashboard/login_trans.Laboratorie') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Dashboard/login_trans.patient') }}" type="text" name="email" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('Dashboard/login_trans.Password') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Dashboard/login_trans.Enter_password') }}" type="password" name="password" required>
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block" type="submit">{{ __('Dashboard/login_trans.Sign_in') }}</button>
                                                </form>
                                            </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $(".loginform").hide(); 

    $("#sectionChooser").change(function() {
        var selectedValue = $(this).val();
        $(".loginform").hide(); 

        if (selectedValue === "patient") {
            $("#patient-login").show(); 
        } else if (selectedValue === "admin") {
            $("#admin-login").show(); 
        } else if (selectedValue === "doctor") {
            $("#doctor-login").show(); 
        } else if (selectedValue === "ray") {
            $("#ray_employee-login").show(); 
        } else if (selectedValue === "laboratorie") {
            $("#laboratorie_employee-login").show();
        }
});
});
</script>
@endsection