@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="show-filter mb-3 text-end">
            <button type="button" class="btn btn--primary showFilterBtn btn-sm"><i class="las la-filter"></i>
                @lang('Filter')</button>
        </div>
        <div class="card responsive-filter-card mb-4">
            <div class="card-body">
                <form action="">
                    <div class="d-flex flex-wrap gap-4">
                        <div class="flex-grow-1">
                            <label>@lang('Username or Transactions number')</label>
                            <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                                placeholder="@lang('Username or Transactions number')">
                        </div>
                        
                        <div class="flex-grow-1">
                            <label>@lang('Type')</label>
                            <select name="type" class="form-control">
                                <option value="">@lang('All')</option>
                                <option value="+" @selected(request()->type == '+')>@lang('Add Balance')</option>
                                <option value="-" @selected(request()->type == '-')>@lang('Subtract Balance')</option>
                            </select>
                        </div>
                        <div class="flex-grow-1">
                            <label>@lang('Date')</label>
                            <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - "
                                data-language="en" class="datepicker-here form-control" data-position='bottom right'
                                placeholder="@lang('Date from - to')" autocomplete="off" value="{{ request()->date }}">
                        </div>
                        <div class="flex-grow-1 align-self-end">
                            <button class="btn btn--primary h-40 w-100"><i class="las la-search"></i>
                                @lang('Search')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Transaction number')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Post Balance')</th>
                                <th>@lang('Details')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trx)
                            <tr>
                                <td>
                                    <a href="{{ appendQuery('search',optional($trx->user)->username) }}">{{
                                        optional($trx->user)->fullname }}</a>
                                </td>

                                <td>
                                    <strong>{{ $trx->trx }}</strong>
                                </td>

                                <td>
                                    {{ showDateTime($trx->created_at) }}
                                </td>

                                <td class="budget">
                                    @if ($trx->trx_type == '+')
                                    <span class="fw-bold text-success">
                                        {{ $trx->trx_type }} {{showAmount($trx->amount)}} {{ $general->cur_text }}
                                    </span>
                                    @else 
                                    <span class="fw-bold text-danger">
                                        {{ $trx->trx_type }} {{showAmount($trx->amount)}} {{ $general->cur_text }}
                                    </span>
                                    @endif
                                    
                                </td>

                                <td class="budget">
                                    {{ __($general->cur_sym) }} {{ showAmount($trx->post_balance) }} 
                                </td>

                                <td>{{ __($trx->details) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if($transactions->hasPages())
            <div class="card-footer py-4">
                {{ paginateLinks($transactions) }}
            </div>
            @endif
        </div><!-- card end -->
    </div>
</div>

@endsection

@push('style-lib')
<link rel="stylesheet" href="{{asset('assets/admin/css/datepicker.min.css')}}">
@endpush


@push('script-lib')
<script src="{{ asset('assets/admin/js/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/datepicker.en.js') }}"></script>
@endpush
@push('script')
<script>
    (function ($) {
        "use strict";
        if (!$('.datepicker-here').val()) {
            $('.datepicker-here').datepicker();
        }
    })(jQuery)
</script>
@endpush