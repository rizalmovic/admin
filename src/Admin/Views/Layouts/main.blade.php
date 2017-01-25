<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{sitename()}} - Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="admin">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title hidden-xs">Admin Panel</div>
                        @yield('title')
                        <div class="panel-action">
                            <div class="btn-group">
                                <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-default"><i class="fa icon-settings"></i> Settings</a>
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($links = config('admin.menus', []) as $link)
                                        <li>
                                            <a href="{{ ($link['link_type'] == 'route') ? route($link['link']) : $link['link'] }}">
                                                <i class="{{ $link['icon'] }}"></i> {{ $link['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('/')}}"><i class="fa icon-home"></i> Home</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa icon-logout"></i> Logout</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

{{-- scripts --}}
@yield('scripts')
</body>
</html>