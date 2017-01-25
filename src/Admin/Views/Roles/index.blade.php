@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-people"></i> Roles Administration
@stop

@section('content')
    <div class="panel-body">
        <form class="row">
            <div class="form-group col-sm-6 col-xs-12">
                <a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-primary outline">Create new role</a>
            </div>
            <div class="form-group col-sm-6 col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </div>
                    <input name="keyword" type="text" class="form-control input-sm" placeholder="Search" value="{{ request()->get('keyword', null) }}">
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Members</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role['name'] }}</td>
                        <td>{{ $role['slug'] }}</td>
                        <td>{{ $role['users']->count() }}</td>
                        <td align="right">
                            <form action="{{route('admin.roles.destroy', $role['id'])}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <a href="{{route('admin.roles.edit', $role['id'])}}" class="btn btn-sm btn-success outline">Edit</a>
                                <button type="submit" class="btn btn-sm btn-danger outline delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer has-pagination">
        {{ $roles->links() }}
    </div>
@stop

@section('scripts')
<script src="{{ asset('js/admin.roles.js') }}"></script>
@stop