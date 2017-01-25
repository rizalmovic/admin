@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-user"></i> User Administration
@stop

@section('content')
    <div class="panel-heading">
        <h5 class="text-primary">Create new user</h5>
    </div>
    <div class="panel-body">
        {!! Former::open(route('admin.users.store')) !!}
            {{ csrf_field() }}
            <div class="col-sm-6">
                {!! Former::text('name')->placeholder('Fullname') !!}
            </div>
            <div class="col-sm-6">
                {!! Former::text('username')->placeholder('Username') !!}

                {!! Former::email('email')->placeholder('Email Address') !!}
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
<script src="{{ asset('js/admin.users.js') }}"></script>
@stop