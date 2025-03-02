@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/Doctors.doctors')}}
@stop
@section('css')
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/Doctors.Doctors')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('Dashboard/Doctors.view_all')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@flasher_render
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('doctors.create')}}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('Dashboard/Doctors.add_doctor')}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
								<th>{{trans('Dashboard/Doctors.image')}}</th>
                                <th >{{trans('Dashboard/Doctors.name')}}</th>
                                <th >{{trans('Dashboard/Doctors.email')}}</th>
                                <th>{{trans('Dashboard/Doctors.section')}}</th>
                                <th >{{trans('Dashboard/Doctors.phone')}}</th>
                                <th >{{trans('Dashboard/Doctors.appointments')}}</th>
                                <th>{{trans('Dashboard/Doctors.price')}}</th>
                                <th >{{trans('Dashboard/Doctors.status')}}</th>
                                <th>{{trans('Dashboard/Doctors.created_at')}}</th>
                                <th>{{trans('Dashboard/Doctors.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                          @foreach($doctors as $doctor)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
								  
								  <td><img src="{{asset('storage/doctors/'.($doctor->image->filename ?? 'no_image.jpg'))}}" width="50
									" height="50" alt="image"></td>
                                  <td>{{ $doctor->name }}</td>
                                  <td>{{ $doctor->email }}</td>
                                  <td>{{ $doctor->section->name}}</td>
                                  <td>{{ $doctor->phone}}</td>
                                  <td>{{ $doctor->appointments}}</td>
                                  <td>{{ $doctor->price}}</td>
                                  <td>
                                      <div class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
                                      {{$doctor->status == 1 ? trans('Dashboard/Doctors.enabled'):trans('Dashboard/Doctors.disabled')}}
                                  </td>

                                  <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                  <td>
                                      <a class="modal-effect btn btn-sm btn-info" href="{{route('doctors.edit',$doctor)}}"><i class="las la-pen"></i></a>
                                      <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$doctor->id}} "data-target="#delete{{$doctor->id}}"><i class="las la-trash"></i></a>
                                  </td>
                              </tr>
                              @include('Dashboard.Doctors.delete')
                          @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>

    <!--Internal  Notify js -->
@endsection