@extends('Dashboard.layouts.master')
@section('css')


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ __('Dashboard/sections_trans.pages') }}</h4>
							<span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('Dashboard/sections_trans.empty') }}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
@flasher_render
				<!-- row -->

					<!-- Content -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                        {{ __('Dashboard/sections_trans.add_section') }}
                    </button>    
                </div>                        
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{ __('Dashboard/sections_trans.section_name') }}</th>
								<th class="wd-15p border-bottom-0">{{ __('Dashboard/sections_trans.section_description') }}</th>

                                <th class="wd-20p border-bottom-0">{{ __('Dashboard/sections_trans.add_date') }}</th>
                                <th class="wd-10p border-bottom-0">{{ __('Dashboard/sections_trans.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
									<td>
										<a href="{{ route('doctors.bySection', $section->id) }}">{{ $section->name }}</a>
									</td>
																		
									<td>{{ $section->description ??'no description found' }}</td>
                                    <td>{{ $section->created_at->diffForHumans()  }}</td>

									<td>
										<a class="modal-effect btn btn-sm btn-info" 
										data-effect="effect-scale" 
										data-toggle="modal" 
										href="#edit{{ $section->id }}" 
										data-target="#edit{{ $section->id }}">
										 <i class="las la-pen"></i>
									 </a>
									 <a class="modal-effect btn btn-sm btn-danger" 
										data-effect="effect-scale" 
										data-toggle="modal" 
										href="#delete{{$section->id}}" 
										data-target="#delete{{$section->id}}">
										 <i class="las la-trash"></i>
									 </a>	
									</td>
                                  
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        <h3 class="m-0">{{ __('Dashboard/sections_trans.no_data_found') }}</h3>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
				@include('Dashboard.Sections.add')
				@include('Dashboard.Sections.edit')
				@include('Dashboard.Sections.delete')
				<!-- row closed -->
</div>
			<!-- Container closed -->
		
		<!-- main-content closed -->
@endsection
@section('js')

@endsection