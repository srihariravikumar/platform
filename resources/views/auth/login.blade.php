@extends('background')

@section('header-buttons')
    @if(setting('registration-enabled', false))
        <a href="{{ baseUrl("/register") }}"><i class="zmdi zmdi-account-add"></i>{{ trans('auth.sign_up') }}</a>
    @endif
@stop

@section('content')

    <div class="text-center">
        <div class="center-box" style="background-color:#fff;border:1px solid #e2e2e2;box-shadow:0 0 5px #888;border-radius:4px;padding-top:25px">
            <center><a href="{{ baseUrl('/') }}"><img style="height:68px" class="logo-image" src="https://cdn.jsdelivr.net/npm/doctub@7.0.0/images/logo-250.png" alt="Logo"></a></center>

            <form action="{{ baseUrl("/login") }}" method="POST" id="login-form">
                {!! csrf_field() !!}


                @include('auth/forms/login/' . $authMethod)

                <div class="form-group">
                    <label for="remember" class="inline">{{ trans('auth.remember_me') }}</label>
                    <input type="checkbox" id="remember" name="remember"  class="toggle-switch-checkbox">
                    <label for="remember" class="toggle-switch"></label>
                </div>


                <div class="from-group">
                    <button style="background-color:transparent;color:#0288d1;border:1px solid" class="button block pos" tabindex="3"><i class="zmdi zmdi-sign-in"></i> {{ title_case(trans('auth.log_in')) }}</button>
                    <center><a href="{{ baseUrl('/register') }}" style="font-size:20px"><i class="zmdi zmdi-account-add"></i>Sign Up</a></center>
                </div>
            </form>

            @if(count($socialDrivers) > 0)
                <hr class="margin-top">
                @foreach($socialDrivers as $driver => $name)
                    <a id="social-login-{{$driver}}" class="button block muted-light svg text-left" href="{{ baseUrl("/login/service/" . $driver) }}">
                        @icon($driver)
                        {{ trans('auth.log_in_with', ['socialDriver' => $name]) }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>

@stop
