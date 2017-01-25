@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-role"></i> Role Administration
@stop

@section('content')
    <div class="panel-heading">
        <h5 class="text-primary">Editing role information</h5>
    </div>
    <div class="panel-body">
        {{ Former::populate($role) }}
        {!! Former::open(route('admin.roles.update', $role['id']) )->method('put') !!}
            <input type="hidden" name="id" value="{{$role['id']}}">

            {!! Former::text('name')->class('form-control input-sm')->placeholder('Name')->required() !!}
            {!! Former::text('slug')->class('form-control input-sm')->placeholder('Slug')->required() !!}
            
            <div class="form-group">
                <button class="btn btn-sm btn-primary outline">Save</button>
                <a href="{{url()->previous()}}" class="btn btn-sm btn-danger outline">Back</a>
            </div>
        {!! Former::close() !!}
    </div>
@stop

@section('scripts')
<script src="{{ asset('js/admin.roles.js') }}"></script>
@stop