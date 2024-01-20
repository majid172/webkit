@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 ">
        <div class="card">
            <div class="card-body px-4">
                <div class="row">
                    <div class="col-lg-6 gx-5">
                        <div class="shadow-none mb-5 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3 mx-auto bg--primary d-flex align-items-center justify-content-center">
                                    <i class="las la-cog text-light" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-lg-9 justify-content-center p-3">
                                    <h5>@lang('Basic')</h5>
                                    <p class="text-secondary">@lang('Basic such as, site title, timezone, currency, notifications, verifications and so on.')</p>
                                    <a href="{{route('admin.setting.index')}}">@lang('Update Settings')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 gx-5">
                        <div class="shadow-none mb-5 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3 mx-auto bg--dark d-flex align-items-center justify-content-center">
                                    <i class="las la-language text-light" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-lg-9 justify-content-center p-3">
                                    <h5>@lang('Language')</h5>
                                    <p class="text-secondary">@lang('Basic such as, site title, timezone, currency, notifications, verifications and so on.')</p>
                                    <a href="{{route('admin.language.manage')}}">@lang('Change Settings')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 gx-5 ">
                        <div class="shadow-none mb-5 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3 mx-auto bg--danger d-flex align-items-center justify-content-center">
                                    <i class="las la-project-diagram text-light" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-lg-9 justify-content-center p-3">
                                    <h5>@lang('SEO')</h5>
                                    <p class="text-secondary">@lang('Basic such as, site title, timezone, currency, notifications, verifications and so on.')</p>
                                    <a href="{{route('admin.seo')}}">@lang('Change Settings')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 gx-5 ">
                        <div class="shadow-none mb-5 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3 mx-auto bg--warning d-flex align-items-center justify-content-center">
                                    <i class="las la-image text-light" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-lg-9 justify-content-center p-3">
                                    <h5>@lang('Logo & Favicon')</h5>
                                    <p class="text-secondary">@lang('Basic such as, site title, timezone, currency, notifications, verifications and so on.')</p>
                                    <a href="{{route('admin.setting.logo.icon')}}">@lang('Change Settings')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 gx-5 ">
                        <div class="shadow-none mb-5 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3 mx-auto bg--info d-flex align-items-center justify-content-center">
                                    <i class="las la-cogs text-light" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-lg-9 justify-content-center p-3">
                                    <h5>@lang('Plugins')</h5>
                                    <p class="text-secondary">@lang('Basic such as, site title, timezone, currency, notifications, verifications and so on.')</p>
                                    <a href="{{route('admin.extensions.index')}}">@lang('Change Settings')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 gx-5 ">
                        <div class="shadow-none mb-5 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3 mx-auto bg--success d-flex align-items-center justify-content-center">
                                    <i class="las la-check-circle text-light" style="font-size: 4rem;"></i>
                                </div>
                                <div class="col-lg-9 justify-content-center p-3">
                                    <h5>@lang('GDPR Policy')</h5>
                                    <p class="text-secondary">@lang('Basic such as, site title, timezone, currency, notifications, verifications and so on.')</p>
                                    <a href="{{route('admin.setting.cookie')}}">@lang('Change Settings')</a>
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

{{-- <div class="card card-large-icons shadow">
    <div class="card-icon bg-primary text-white">
        <i class="fas fa-cog"></i>
    </div>
    <div class="card-body">
        <h4>Basic</h4>
        <p>Basic such as, site title, timezone, currency, notifications, verifications and so on.</p>
        <a href="" class="card-cta">Change Setting<i class="fas fa-chevron-right"></i></a>
    </div>
</div> --}}
