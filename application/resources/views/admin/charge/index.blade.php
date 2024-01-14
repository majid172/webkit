@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-header">
                @lang('Charge Per Course')
            </div>
            <div class="card-body px-4">
                <form action="{{route('admin.charge.update')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="required">@lang('Fixed Charge')</label>
                            <div class="input-group mb-3">
                               
                                <input type="text" name="fixed_charge" value="{{getAmount($charge->fixed_charge)}}" class="form-control" placeholder="@lang('Fixed charge per course')" aria-label="@lang('Fixed charge per course')" aria-describedby="basic-addon2">
                                <span class="input-group-text bg--primary" id="basic-addon2">@lang($general->cur_text)</span>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <label class="required">@lang('Percentage Charge')</label>
                            <div class="input-group mb-3">
                                <input type="text" name="percentage_charge" value="{{getAmount($charge->percentage_charge)}}" class="form-control" placeholder="@lang('Percentage charge per course')" aria-label="@lang('Percentage charge per course')" aria-describedby="basic-addon2">
                                <span class="input-group-text bg--primary" id="basic-addon2">%</span>
                              </div>
                        </div>
                        
                    </div>
                    
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col">
                                <button type="submit" class="btn btn--primary btn-global w-100">@lang('Change Now')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush