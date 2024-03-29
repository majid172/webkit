@extends('admin.layouts.app')
@section('panel')


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 card-primary shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text--primary">@lang('List')</h6>
                <a href="{{route('admin.frontend.sections.element',$key)}}" class="btn btn-sm btn-outline--primary"><i
                    class="las la-plus"></i>@lang('Add New')</a>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-items-center table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>@lang('SL')</th>
                                @if(@$section->element->images)
                                <th>@lang('Image')</th>
                                @endif
                                @foreach($section->element as $k => $type)
                                @if($k !='modal')
                                @if($type=='text' || $type=='icon')
                                <th>{{ __(keyToTitle($k)) }}</th>
                                @elseif($k == 'select')
                                <th>{{keyToTitle(@$section->element->$k->name)}}</th>
                                @endif
                                @endif
                                @endforeach
                                <th>@lang('Action')</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>@lang('Cookie Policy')</td>
                                <td><a title="@lang('Edit')"
                                    href="{{route('admin.setting.cookie')}}"
                                    class="btn btn-sm btn--primary"><i class="las la-edit"></i>
                                </a></td>
                            </tr>
                            @forelse($elements as $data)
                            <tr>
                                <td>{{$loop->iteration + 1}}</td>
                                @if(@$section->element->images)
                                @php $firstKey = collect($section->element->images)->keys()[0]; @endphp
                                <td>
                                    <div class="customer-details d-block">
                                        <a href="javascript:void(0)" class="thumb">
                                            <img src="{{ getImage('assets/images/frontend/' . $key .'/'. @$data->data_values->$firstKey,@$section->element->images->$firstKey->size) }}"
                                                alt="@lang('image')">
                                        </a>
                                    </div>
                                </td>
                                @endif
                                @foreach($section->element as $k => $type)
                                @if($k !='modal')
                                @if($type == 'text' || $type == 'icon')
                                @if($type == 'icon')
                                <td>@php echo @$data->data_values->$k; @endphp</td>
                                @else
                                <td>{{__(@$data->data_values->$k)}}</td>
                                @endif
                                @elseif($k == 'select')
                                @php
                                $dataVal = @$section->element->$k->name;
                                @endphp
                                <td>{{@$data->data_values->$dataVal}}</td>
                                @endif
                                @endif
                                @endforeach
                                <td>
                                    <div class="button--group">
                                        @if($section->element->modal)
                                        @php
                                        $images = [];
                                        if(@$section->element->images){
                                        foreach($section->element->images as $imgKey => $imgs){
                                        $images[] = getImage('assets/images/frontend/' . $key .'/'.
                                        @$data->data_values->$imgKey,@$section->element->images->$imgKey->size);
                                        }
                                        }
                                        @endphp
                                        <button title="@lang('Edit')" class="btn btn-sm btn--primary updateBtn"
                                            data-id="{{$data->id}}" data-all="{{json_encode($data->data_values)}}"
                                            @if(@$section->element->images)
                                            data-images="{{ json_encode($images) }}"
                                            @endif>
                                            <i class="las la-edit"></i>
                                        </button>
                                        @else
                                        <a title="@lang('Edit')"
                                            href="{{route('admin.frontend.sections.element',[$key,$data->id])}}"
                                            class="btn btn-sm btn--primary"><i class="las la-edit"></i>
                                        </a>
                                        @endif
                                        <button title="@lang('Remove')" class="btn btn-sm btn--danger confirmationBtn"
                                            data-action="{{ route('admin.frontend.remove',$data->id) }}"
                                            data-question="@lang('Are you sure to remove this item?')"><i
                                                class="la la-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

<x-confirmation-modal></x-confirmation-modal>
@endsection

@push('breadcrumb-plugins')

@endpush

@push('script')

<script>
    (function ($) {
        "use strict";

        $('.addBtn').on('click', function () {
            var modal = $('#addModal');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

    })(jQuery);

</script>

@endpush