@extends('Admin::layouts.main')

@section('title')
    <i class="icons icon-user"></i> User Administration
@stop

@section('content')
    <div class="panel-heading">
        <h5 class="text-primary">Editing user information</h5>
    </div>
    <div class="panel-body">
        <form action="{{route('admin.users.update', $user['id'])}}" method="post">
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{$user['id']}}">
            <div class="form-group form-group-sm">
                <label>Name</label>
                <input name="name" type="text" class="form-control" placeholder="Fullname" value="{{$user['name']}}" required tabindex="1">
            </div>
            {{-- <div class="form-group form-group-sm">
                <label>Roles</label>
                <select name="roles" class="form-control" tabindex="2">
                    <option selected disabled>Choose role</option>
                </select>
            </div> --}}
            <div class="form-group form-group-sm">
                <label>Username</label>
                <input name="username" type="text" class="form-control" placeholder="Username" value="{{$user['username']}}" required tabindex="3">
            </div>
            <div class="form-group form-group-sm">
                <label>Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email Address" value="{{$user['email']}}" required tabindex="4">
            </div>
            
            <div class="form-group">
                <button class="btn btn-sm btn-primary outline">Save</button>
                <a href="{{url()->previous()}}" class="btn btn-sm btn-danger outline">Back</a>
            </div>
        </form>
    </div>
@stop

@section('scripts')
<script src="{{ asset('js/admin.users.js') }}"></script>
@stop