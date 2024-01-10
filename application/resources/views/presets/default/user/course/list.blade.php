@extends($activeTemplate.'layouts.master')
@section('content')
@include($activeTemplate.'includes.breadcumb')
<div class="py-5 ">
    <div class="container">
        <div class="row justify-content-center">
            @include($activeTemplate.'includes.sidebar')
            <div class="col-md-9">
                @if (auth()->user()->user_type == 1)
                <div class="text-end mb-3">
                   <a href="{{route('user.course.create')}}" class="btn btn-sm btn-primary"><i class="las la-plus"></i>@lang('Create Course')</a>
                </div>
                @endif
                
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <main class="cd__main">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('No. of Episodes')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $list)
                                    <tr>
                                        <td>
                                            {{ucwords($list->name) }} <br>
                                                @if (auth()->user()->user_type != 1)
                                                    @foreach ($list->categoryDetails as $detail)
                                                    <span class="text-secondary">
                                                       @lang('author by ') - {{ucfirst(optional($detail->creator)->username)}}
                                                    </span>
                                                    @endforeach
                                                @endif
                                        </td>
                                        <td>
                                            <span class="badge rounded-circle bg-primary">
                                            @foreach ($list->categoryDetails as $details)
                                                @foreach ($details->episodes as $episode)
                                                    {{$episode->count()}}
                                                @endforeach 
                                            @endforeach
                                            </span>
                                        </td>

                                        <td>{{$general->cur_sym}}{{getAmount($list->price)}}</td>
                                        <td>{{ showDateTime($list->created_at) }}</td>
                                        
                                        <td>
                                            @if (auth()->user()->user_type)
                                            <a href="{{route('user.episode.list')}}" class="btn btn-outline-primary btn-sm"><i class="las la-eye"></i> @lang('View')</a>
                                            @else
                                            <a href="{{route('user.course.episode.list',$list->id)}}" class="btn btn-outline-primary btn-sm"><i class="las la-eye"></i> @lang('View')</a>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- APPROVE MODAL --}}
{{-- <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Details')</h5>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <ul class="list-group userData mb-2">
                </ul>
                <div class="feedback"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div> --}}

{{-- create episode --}}

@endsection


@push('script')
<script>
    (function ($) {
        "use strict";
        $('.detailBtn').on('click', function () {
            var modal = $('#detailModal');

            var userData = $(this).data('info');
            var html = '';
            if (userData) {
                userData.forEach(element => {
                    if (element.type != 'file') {
                        html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                    }
                });
            }

            modal.find('.userData').html(html);

            if ($(this).data('admin_feedback') != undefined) {
                var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
            } else {
                var adminFeedback = '';
            }

            modal.find('.feedback').html(adminFeedback);


            modal.modal('show');
        });
    })(jQuery);

</script>
<script src="{{asset($activeTemplateTrue.'js/table.js')}}"></script>
@endpush