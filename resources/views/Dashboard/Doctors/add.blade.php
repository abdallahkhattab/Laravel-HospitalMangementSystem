@extends('Dashboard.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{ URL::asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
    {{ trans('Dashboard/Doctors.add_doctor') }}
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main-sidebar_trans.doctors') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/Doctors.add_doctor') }}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @flasher_render

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doctors.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <!-- Name Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="name">{{ trans('Dashboard/Doctors.name') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control @error('name') is-invalid @enderror" 
                                           name="name" 
                                           id="name" 
                                           type="text" 
                                           value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="email">{{ trans('Dashboard/Doctors.email') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           id="email" 
                                           type="email" 
                                           value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="password">{{ trans('Dashboard/doctors.password') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control @error('password') is-invalid @enderror" 
                                           name="password" 
                                           id="password" 
                                           type="password">
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="phone">{{ trans('Dashboard/Doctors.phone') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control @error('phone') is-invalid @enderror" 
                                           name="phone" 
                                           id="phone" 
                                           type="text" 
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Section Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="section_id">{{ trans('Dashboard/Doctors.section') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select name="section_id" 
                                            id="section_id" 
                                            class="form-control SlectBox @error('section_id') is-invalid @enderror">
                                        <option value="" selected disabled>{{ trans('Dashboard/Doctors.select_section') }}</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" 
                                                    {{ old('section_id') == $section->id ? 'selected' : '' }}>
                                                {{ $section->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <!-- Appointments Field -->
                       <!-- Appointments Field -->
                <div class="row row-xs align-items-center mg-b-20">
                    <div class="col-md-1">
                        <label for="appointments">{{ trans('Dashboard/Doctors.appointments') }}</label>
                    </div>
                    <div class="col-md-11 mg-t-5 mg-md-t-0">
                        <select multiple="multiple" 
                                class="testselect2 @error('appointments') is-invalid @enderror" 
                                name="appointments[]" 
                                id="appointments">
                            <option value="" disabled>{{ trans('Dashboard/Doctors.select_appointments') }}</option>
                            @foreach ($appointments as $appointment )

                            <option value="{{ $appointment->id }}">{{ $appointment->name }}</option>
     
                            @endforeach
                        </select>
                        @error('appointments')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                            <!-- Price Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="price">{{ trans('Dashboard/Doctors.price') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control @error('price') is-invalid @enderror" 
                                           name="price" 
                                           id="price" 
                                           type="number" 
                                           step="0.01" 
                                           value="{{ old('price', '0.00') }}">
                                    @error('price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           
                     <!-- Image Field -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="photo">{{ trans('Dashboard/Doctors.image') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input type="file" 
                                        accept="image/*" 
                                        name="photo" 
                                        id="photo" 
                                        class="form-control @error('photo') is-invalid @enderror" 
                                        onchange="loadFile(event)">
                                    
                                    <!-- Image Preview (Hidden Initially) -->
                                    <img id="output" 
                                        style="border-radius:50%; margin-top:10px; display: none;" 
                                        width="150px" 
                                        height="150px" 
                                        alt="Doctor Preview">

                                    @error('photo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Field (added from DoctorRequest validation rules) -->
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="status">{{ trans('Dashboard/Doctors.status') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select name="status" 
                                            id="status" 
                                            class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                            {{ trans('Dashboard/Doctors.enabled') }}
                                        </option>
                                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>
                                            {{ trans('Dashboard/Doctors.disabled') }}
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" 
                                    class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">
                                {{ trans('Dashboard/Doctors.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block'; // Show image when selected
        output.onload = function() {
            URL.revokeObjectURL(output.src); // Free memory
        };
    };


    </script>

<script>
    $(document).ready(function() {
        $('.testselect2').SumoSelect({
            placeholder: '{{ trans("Dashboard/Doctors.select_appointments") }}',
            csvDispCount: 3,
            search: true,
            searchText: '{{ trans("Dashboard/Doctors.search_appointments") }}'
        });
    });
</script>

    <script src="{{ URL::asset('Dashboard/js/select2.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection