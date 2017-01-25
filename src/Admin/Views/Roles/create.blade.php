@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-people"></i> Role Administration
@stop

@section('content')
    <div class="panel-heading">
        <h5 class="text-primary">Create new role</h5>
    </div>
    <div class="panel-body">
        {!! Former::open(route('admin.roles.store')) !!}
            {{ csrf_field() }}
            <div class="col-sm-6">
                {!! Former::text('name')->class('form-control input-sm')->placeholder('Name')->required() !!}
                {!! Former::text('slug')->class('form-control input-sm')->placeholder('Slug')->required() !!}
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-sm btn-primary outline">Save</button>
                    <a href="{{url()->previous()}}" class="btn btn-sm btn-danger outline">Back</a>
                </div>
            </div>
        {!! Former::close() !!}
    </div>
@stop

@section('scripts')
<script src="{{ asset('js/admin.roles.js') }}"></script>
@stop