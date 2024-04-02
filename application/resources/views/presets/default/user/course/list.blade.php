@extends($activeTemplate.'layouts.master')
@section('content')
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
                                    <th>@lang('Title')</th>
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
                                            {{ucwords($list->title) }}
                                        </td>
                                        <td>
                                            <span class="badge rounded-circle bg-primary">
                                            {{$list->episodes->count()}}
                                            </span>
                                        </td>

                                        <td>{{$general->cur_sym}}{{getAmount($list->price)}}</td>
                                        <td>{{ showDateTime($list->created_at) }}</td>

                                        <td>
                                            @if (auth()->user()->user_type)
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="las la-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                  <li><a class="dropdown-item" href="{{route('user.course.edit',$list->id)}}"><i class="las la-edit me-2 text-warning"></i>@lang('Edit Course')</a></li>
                                                  <li><a class="dropdown-item" href="{{route('user.episode.list',$list->id)}}"><i class="las la-play-circle me-2 text-primary"></i>@lang('Episode lists')</a></li>

                                                </ul>
                                              </div>
                                            @else
                                            <a href="{{route('user.episode.list',$list->id)}}" class="btn btn-outline-primary btn-sm"><i class="las la-eye"></i> @lang('View')</a>
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
