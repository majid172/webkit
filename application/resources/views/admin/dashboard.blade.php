@extends('admin.layouts.app')

@section('panel')
@if(@json_decode($general->system_info)->message)
<div class="row">
    @foreach(json_decode($general->system_info)->message as $msg)
    <div class="col-md-12">
        <div class="alert border border--primary" role="alert">
            <div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>
            <p class="alert__message">@php echo $msg; @endphp</p>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="row gy-4">
    <div class="col-xl-12">
        <div class="row gy-2">
            <div class="col-lg-3">
                <div class="shadow-lg mb-5 bg-light rounded">
                    <a href="{{route('admin.deposit.list')}}">
                    <div class="row">
                        <div class="col-lg-3 mx-auto bg--primary d-flex align-items-center justify-content-center">
                            <i class="fas fa-coins" style="font-size: 2rem;"></i> 
                        </div>
                        <div class="col-lg-9 justify-content-center p-3">
                            <h6 class="m-b-5">@lang('Funded Amount')</h6>
                            <h3 class="m-b-0">{{ $general->cur_sym}}{{showAmount($deposit['total_deposit_amount'])}}</h3>
                            
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shadow-lg mb-5 bg-light rounded">
                    <a href="{{route('admin.deposit.list')}}">
                    <div class="row">
                        <div class="col-lg-3 mx-auto bg--primary d-flex align-items-center justify-content-center">
                            <i class="las la-percent" style="font-size: 2rem;"></i> 
                        </div>
                        <div class="col-lg-9 justify-content-center p-3">
                            <h6 class="m-b-5">@lang('Funded Charge')</h6>
                            <h3 class="m-b-0 ">{{ $general->cur_sym}}{{showAmount($deposit['total_deposit_charge'])}}</h3>
                            
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shadow-lg mb-5 bg-light rounded">
                    <a href="{{route('admin.withdraw.log')}}">
                    <div class="row">
                        <div class="col-lg-3 mx-auto bg--primary d-flex align-items-center justify-content-center">
                            <i class="lar la-credit-card" style="font-size: 2rem;"></i> 
                        </div>
                        <div class="col-lg-9 justify-content-center p-3">
                            <h6 class="m-b-5 ">@lang('Total Payout')</h6>
                            <h3 class="m-b-0">{{ $general->cur_sym
                                }}{{showAmount($withdrawals['total_withdraw_amount'])}}</h3>
                            
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shadow-lg mb-5 bg-light rounded">
                    <a href="{{route('admin.withdraw.approved')}}">
                    <div class="row">
                        <div class="col-lg-3 mx-auto bg--primary d-flex align-items-center justify-content-center">
                            <i class="las la-percent" style="font-size: 2rem;"></i> 
                        </div>
                        <div class="col-lg-9 justify-content-center p-3">
                            <h6 class="m-b-5">@lang('Payout Charge')</h6>
                            <h3 class="m-b-0">{{ $general->cur_sym}}{{showAmount($withdrawals['total_withdraw_charge'])}}</h3>
                            
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row gy-4">
            <div class="col-sm-12">
                <div class="card p-3 rounded-3">
                    <div class="row g-0">
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-users"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.all')}}"></a>
                                    <h5>{{$widget['total_users']}}</h5>
                                    <span>@lang('Total Users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4 ">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-user-check"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.active')}}"></a>
                                    <h5>{{$widget['verified_users']}}</h5>
                                    <span>@lang('Active Users')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-envelope"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.users.email.unverified')}}"></a>
                                    <h5>{{$widget['email_unverified_users']}}</h5>
                                    <span>@lang('Email Unverified')</span>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-credit-card"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.withdraw.pending')}}"></a>
                                    <h5>{{$withdrawals['total_withdraw_pending']}}</h5>
                                    <span>@lang('Pending Payouts')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-spinner"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.pending')}}"></a>
                                    <h5>{{$deposit['total_deposit_pending']}}</h5>
                                    <span>@lang('Pending Funds')</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 col-xl-6 col-xxl-4">
                            <div class="dashboard-widget">
                                <div class="dashboard-widget__icon">
                                    <i class="dashboard-card-icon las la-ban"></i>
                                </div>
                                <div class="dashboard-widget__content">
                                    <a title="@lang('View all')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.rejected')}}">
                                    </a>
                                    <h5>{{$deposit['total_deposit_rejected']}}</h5>
                                    <span>@lang('Rejected Funds')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">@lang('Current Tickets')</h5>
                    <a href="{{route('admin.ticket.pending')}}" class="float-end" target="_blank">@lang('View all')</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('Subject')</th>
                                <th>@lang('Status')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newTickets as $item)
                            <tr>
                                <td>
                                    <a class="" href="{{ route('admin.ticket.view', $item->id) }}" class="fw-bold">
                                        @lang('Ticket')#{{ $item->ticket }} - {{ strLimit($item->subject,30) }} </a>
                                </td>
                                <td>
                                    @php echo $item->statusBadge; @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-xl-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Report on Monthly Funds and Payouts')</h5>
                <div id="account-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Daily Logins for the Past 10 Days')</h5>
                <div id="login-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">@lang('Login Browser History')</h5>
                <div id="os-chart"></div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('script')

<script src="{{asset('assets/admin/js/apexcharts.min.js')}}"></script>
<script>
    "use strict";
    // [ account-chart ] start
    (function () {
        var options = {
            chart: {
                type: 'area',
                stacked: false,
                height: '310px'
            },
            stroke: {
                width: [0, 3],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
            colors: ['#7752fe', '#F0AAB4'],
            series: [{
                name: '@lang("Withdrawals")',
                type: 'column',
                data: @json($withdrawalsChart['values'])
    }, {
        name: '@lang("Deposits")',
        type: 'area',
        data: @json($depositsChart['values'])
    }],
    fill: {
        opacity: [0.85, 1],
                },
    labels: @json($depositsChart['labels']),
    markers: {
        size: 0
    },
    xaxis: {
        type: 'text'
    },
    yaxis: {
        min: 0
    },
    tooltip: {
        shared: true,
            intersect: false,
                y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return "$ " + y.toFixed(0);
                }
                return y;

            }
        }
    },
    legend: {
        labels: {
            useSeriesColors: true
        },
        markers: {
            customHTML: [
                function () {
                    return ''
                },
                function () {
                    return ''
                }
            ]
        }
    }
            }
    var chart = new ApexCharts(
        document.querySelector("#account-chart"),
        options
    );
    chart.render();
        }) ();

    // [ login-chart ] start
    (function () {
        var options = {
            series: [{
                name: "User Count",
                data: @json($userLogins['values'])
    }],
    chart: {
        height: '310px',
            type: 'area',
                zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    colors: ['#7752fe'],
        labels: @json($userLogins['labels']),
    xaxis: {
        type: 'date',
    },
    yaxis: {
        opposite: true
    },
    legend: {
        horizontalAlign: 'left'
    }
        };

    var chart = new ApexCharts(document.querySelector("#login-chart"), options);
    chart.render();
    }) ();

    // os histroy
    (function () {
        var options = {
          series:  @json($userBrowser['values']),
          chart: {
          type: 'donut',
          height:'310px',
        },
        labels: @json($userBrowser['labels']),
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#os-chart"), options);
        chart.render();
    }) ();


 

</script>
@endpush