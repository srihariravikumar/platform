@extends('base')

@section('content')

    <div class="container">
      <center>
        <h1 class="text-muted">{{ trans('errors.error_occurred') }}</h1>
        <p><img style="height:200px" src="https://cdn.rawgit.com/doctub/static/b5be0e2b/images/down.svg"></p>
        <p>{{ $message }}</p>
      </center>
    </div>

@stop