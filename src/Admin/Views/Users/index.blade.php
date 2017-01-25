@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-user"></i> User Administration
@stop

@section('content')
    <div class="panel-body">
        <form class="row">
            <div class="form-group col-sm-6 col-xs-12">
                <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-primary outline">Create new user</a>
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
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>
                            <a href="mailto:{{ $user['email'] }}">{{ $user['email'] }}</a>
                        </td>
                        <td align="right">
                            <form action="{{route('admin.users.destroy', $user['id'])}}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <a href="{{route('admin.users.edit', $user['id'])}}" class="btn btn-sm btn-success outline">Edit</a>
                                <button type="submit" class="btn btn-sm btn-danger outline delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer has-pagination">
        {{ $users->links() }}
    </div>
@stop

@section('scripts')
<script src="{{ asset('js/admin.users.js') }}"></script>
@stop