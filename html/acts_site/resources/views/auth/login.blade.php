@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><img src="{{ asset('img/icons/key.png') }}" height="24px"> <b> @lang('auth.login')</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"> @lang('auth.user_login')</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('auth.user_password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>  @lang('auth.remember_me')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #1f5dff;">@lang('auth.login_btn')
                                   <i class="fa fa-unlock" aria-hidden="true"></i> 
                                </button>

                               <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('auth.forgot_password')
                                </a>
                                -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
