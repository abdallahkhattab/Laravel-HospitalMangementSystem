@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/Services.Services')}}
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/Services.Services')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/Services.add_Service')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@flasher_render

@include('Dashboard.messages.errors')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{trans('Dashboard/Services.add_Service')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> {{trans('Dashboard/Services.name')}}</th>
                                <th> {{trans('Dashboard/Services.price')}}</th>
                                <th> {{trans('Dashboard/Doctors.status')}}</th>
                                <th> {{trans('Dashboard/Services.description')}}</th>
                                <th>{{trans('Dashboard/Services.created_at')}}</th>
                                <th>{{trans('Dashboard/Services.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->price}}</td>
                                    <td>
                                        <div
                                            class="dot-label bg-{{$service->status == 1 ? 'success':'danger'}} ml-1"></div>
                                        {{$service->status == 1 ? trans('Dashboard/Services.Enabled'):trans('Dashboard/Services.Not_enabled')}}
                                    </td>
                                    <td> {{ Str::limit($service->description, 50) }}</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#edit{{$service->id}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{$service->id}}"><i
                                                class="las la-trash"></i></a>
                                    </td>
                                </tr>

								@include('Dashboard.Services.edit')
								@include('Dashboard.Services.delete')
	
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.Services.add')
    <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
@endsection