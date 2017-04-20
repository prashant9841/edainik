@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row center">
        <div class="col s12 m6 offset-m6 l4 offset-l4">
            <div class="card">
                <div class="card-content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email">eMail</label>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field col s12 ">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field col s6">
                            <button type="submit" class="btn" style="text-transform: none">Log In</button>
                        </div>

                        <div class="input-field col s6">
                          <input type="checkbox" class="filled-in" id="filled-in-box" name="remember" checked="{{ old('remember') ? 'checked' : '' }}" />
                          <label for="filled-in-box">Remember Me</label>
                        </div>

                        <div class="row">
                            <a class="input-field col s12" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>
                    </form>                
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection
