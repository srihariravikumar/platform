@extends('public')

@section('content')

    <div class="container">
      <center>
        <h1 class="text-muted">{{ trans('errors.app_down', ['appName' => setting('app-name')]) }}</h1>
        <p><img style="height:200px" src=""></p>
         <h2><p>{{ trans('errors.back_soon') }}</p></h2>
      </center>
    </div>

@stop