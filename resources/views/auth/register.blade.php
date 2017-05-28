@extends('background')

@section('header-buttons')
    <a href="{{ baseUrl("/login") }}"><i class="zmdi zmdi-sign-in"></i>{{ trans('auth.log_in') }}</a>
@stop

@section('content')

    <div class="text-center">
        <div class="center-box" style="background-color:#fff;border:1px solid #e2e2e2;box-shadow:0 0 5px #888;border-radius:4px;padding-top:25px">
            <center><img style="height:68px" class="logo-image" src="https://doctub-cdn.firebaseapp.com/images/logo.png" alt="Logo"></center>

            <form action="{{ baseUrl("/register") }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">{{ trans('auth.name') }}</label>
                    @include('form/text', ['name' => 'name'])
                </div>

                <div class="form-group">
                    <label for="email">{{ trans('auth.email') }}</label>
                    @include('form/text', ['name' => 'email'])
                </div>

                <div class="form-group">
                    <label for="password">{{ trans('auth.password') }}</label>
                    @include('form/password', ['name' => 'password', 'placeholder' => trans('auth.password_hint')])
                </div>

                <div class="from-group">
                    <button style="background-color:transparent;color:#0288d1;border:1px solid" class="button block pos">{{ trans('auth.create_account') }}</button>
                    <center><a href="{{ baseUrl('/login') }}" style="font-size:20px"><i class="zmdi zmdi-sign-in"></i>Login</a></center>
                </div>
            </form>

            @if(count($socialDrivers) > 0)
                <hr class="margin-top">
                @foreach($socialDrivers as $driver => $name)
                    <a id="social-register-{{$driver}}" class="button block muted-light svg text-left" href="{{ baseUrl("/register/service/" . $driver) }}">
                        @icon($driver)
                        {{ trans('auth.sign_up_with', ['socialDriver' => $name]) }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>


@stop
