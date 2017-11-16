@extends('template')

@section('content')
<div class="container" id="login">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="panel ">

@if(session()->has('newsletter_message.level'))
<div class="mx-auto alert alert-{{ session('newsletter_message.level') }}" style="width:300px;"> 
<small>{!! session('newsletter_message.content') !!}</small>
</div>
@endif

                <div class="card-header">Login</div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 col-form-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control-sm" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 col-form-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control-sm" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-light" role="button" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
