@extends($activeTemplate.'layouts.master')
@section('content')

<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9 mb-5">
                <div class="shadow p-3 mb-5 bg-body rounded ">
                    <h5 class="card-title text-primary">@lang('Profile')</h5>
                    <div class="card-body">
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('First Name')</label>
                                    <input type="text" class="form-control form--control" name="firstname"
                                        value="{{$user->firstname}}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Last Name')</label>
                                    <input type="text" class="form-control form--control" name="lastname"
                                        value="{{$user->lastname}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('E-mail Address')</label>
                                    <input class="form-control form--control" value="{{$user->email}}" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Mobile Number')</label>
                                    <input class="form-control form--control" value="{{$user->mobile}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Address')</label>
                                    <input type="text" class="form-control form--control" name="address"
                                        value="{{@$user->address->address}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('State')</label>
                                    <input type="text" class="form-control form--control" name="state"
                                        value="{{@$user->address->state}}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Zip Code')</label>
                                    <input type="text" class="form-control form--control" name="zip"
                                        value="{{@$user->address->zip}}">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('City')</label>
                                    <input type="text" class="form-control form--control" name="city"
                                        value="{{@$user->address->city}}">
                                </div>


                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Country')</label>
                                    <input class="form-control form--control" value="{{@$user->address->country}}" disabled>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Profile Image')</label>
                                    <input type="file" class="form-control form--control" value="{{getImage
                                    (getFilePath('episode').'/' . @$user->image .'/'. @$user->img_path)}}"
                                           name="profile_img">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Designation')</label>
                                    <input class="form-control form--control" value="{{@$user->designation}}"
                                           name="designation"
                                           type="text" placeholder="@lang('Designation')">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Facebook')</label>
                                    <input class="form-control form--control" value="{{@$user->social_link->fb}}"
                                           name="fb"
                                           type="text" placeholder="@lang('Facebook Link')">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Twitter')</label>
                                    <input class="form-control form--control"
                                           value="{{@$user->social_link->twitter}}" name="twitter"
                                           type="text" placeholder="@lang('Twitter Link')">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Linked In')</label>
                                    <input class="form-control form--control"
                                           value="{{@$user->social_link->linkedin}}" name="linkedin"
                                           type="text" placeholder="@lang('LinkedIn Link')">
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">@lang('Profile Update')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
