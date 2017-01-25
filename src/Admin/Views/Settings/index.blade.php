@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-settings"></i> Settings
@stop

@section('content')
    {{Former::populate($settings)}}
    {!! Former::open(route('admin.settings.save')) !!}
        <div class="panel-body">
            @foreach($settings as $setting)
                {!! Former::hidden('setting['. $setting->slug .'][id]')->value($setting->id) !!}
                {!! Former::hidden('setting['. $setting->slug .'][slug]')->value($setting->slug) !!}
                {!! Former::text('setting['. $setting->slug .'][value]')->label($setting->name)->value($setting->value) !!}
            @endforeach
        </div>
        <div class="panel-footer">
            <button class="btn btn-sm btn-primary outline">Save</button>
            <div class="pull-right">
                <a href="javascript:;" class="btn btn-sm btn-success outline"><i class="fa fa-plus"></i> Add new setting</a>
            </div>
        </div>
    {!! Former::close() !!}
@stop