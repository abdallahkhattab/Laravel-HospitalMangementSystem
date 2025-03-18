@extends('Dashboard.layouts.master')

@section('css')
@endsection

@section('title')
    معلومات المريض
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item">
                                                <a href="#tab1" class="nav-link active" data-toggle="tab">معلومات المريض</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">الفواتير</a></li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">المدفوعات</a></li>
                                            <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">كشف حساب</a></li>
                                            <li class="nav-item"><a href="#tab5" class="nav-link" data-toggle="tab">الأشعة</a></li>
                                            <li class="nav-item"><a href="#tab6" class="nav-link" data-toggle="tab">المختبر</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">
                                        {{-- Show Patient Information --}}
                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم المريض</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>البريد الإلكتروني</th>
                                                        <th>تاريخ الميلاد</th>
                                                        <th>النوع</th>
                                                        <th>فصيلة الدم</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $patient->name }}</td>
                                                        <td>{{ $patient->Phone }}</td>
                                                        <td>{{ $patient->email }}</td>
                                                        <td>{{ $patient->Date_Birth }}</td>
                                                        <td>{{ $patient->Gender == 1 ? 'ذكر' : 'أنثى' }}</td>
                                                        <td>{{ $patient->Blood_Group }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Show Patient Information --}}

                                        {{-- Start Invoices --}}
                                        <div class="tab-pane" id="tab2">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الخدمة</th>
                                                        <th>تاريخ الفاتورة</th>
                                                        <th>الإجمالي مع الضريبة</th>
                                                        <th>نوع الفاتورة</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    @foreach($invoices as $invoice)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $invoice->service->name }}</td>
                                                            <td>{{ $invoice->invoice_date }}</td>
                                                            <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                                            <td>{{ $invoice->type == 1 ? 'نقدي' : 'آجل' }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="4" class="alert alert-success">الإجمالي</th>
                                                        <td class="alert alert-primary">{{ number_format($invoices->sum('total_with_tax'), 2) }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Invoices --}}

                                        {{-- Start Receipt Accounts --}}
                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>تاريخ الإضافة</th>
                                                        <th>المبلغ</th>
                                                        <th>البيان</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($receiptAccounts as $receipt)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $receipt->date }}</td>
                                                            <td>{{ number_format($receipt->amount, 2) }}</td>
                                                            <td>{{ $receipt->description }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="3" class="alert alert-success">الإجمالي</th>
                                                        <td class="alert alert-primary">{{ number_format($receiptAccounts->sum('amount'), 2) }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Receipt Accounts --}}

                                        {{-- Start Patient Accounts --}}
                                        <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>تاريخ الإضافة</th>
                                                        <th>الوصف</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>الرصيد النهائي</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patientAccounts as $account)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $account->date }}</td>
                                                            <td>{{ $account->description }}</td>
                                                            <td>{{ number_format($account->Debit, 2) }}</td>
                                                            <td>{{ number_format($account->credit, 2) }}</td>
                                                            <td>{{ number_format($account->Debit - $account->credit, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- End Patient Accounts --}}
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
