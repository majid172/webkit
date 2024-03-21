<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <input type="text" id="trx" class="form-control" placeholder="@lang('Trx number')">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <input type="number" id="min" class="form-control" placeholder="@lang('Min amount')">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <input type="number" id="max" class="form-control" placeholder="@lang('Max amount')">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <select type="text" id="status" class="form-control"  placeholder="@lang('Status')">
                <option value="">@lang('Status')</option>
                <option value="0">@lang('Initiated')</option>
                <option value="2">@lang('Pending')</option>
                <option value="1">@lang('Approved')</option>
                <option value="1">@lang('Succeed')</option>
                <option value="3">@lang('Rejected')</option>
            </select>
        </div>
    </div>
</div>
