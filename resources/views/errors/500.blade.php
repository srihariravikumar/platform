@extends('base')

@section('content')

    <div class="container">
      <center>
        <h1 class="text-muted">{{ trans('errors.error_occurred') }}</h1>
        <p><img style="height:200px" src="https://cdn.jsdelivr.net/npm/doctub@7.0.0/images/error.svg/images/down.svg"></p>
        <p>{{ $message }}</p>
      </center>
    </div>

@stop