@extends('base')

@section('content')


<div class="container">

    <center>
    <h1>{{ $message or trans('errors.404_page_not_found') }}</h1>
    <p><img style="height:200px" src="https://cdn.jsdelivr.net/gh/doctub/static@2.0/images/error.svg"></p>
    <p><a href="{{ baseUrl('/') }}" class="button">{{ trans('errors.return_home') }}</a></p>
    </center>

    @if (setting('app-public') || !user()->isDefault())
        <hr>

        <div class="row">
            <div class="col-md-4">
                <h3 class="text-muted">{{ trans('entities.pages_popular') }}</h3>
                @include('partials.entity-list', ['entities' => Views::getPopular(10, 0, [\BookStack\Page::class]), 'style' => 'compact'])
            </div>
            <div class="col-md-4">
                <h3 class="text-muted">{{ trans('entities.books_popular') }}</h3>
                @include('partials.entity-list', ['entities' => Views::getPopular(10, 0, [\BookStack\Book::class]), 'style' => 'compact'])
            </div>
            <div class="col-md-4">
                <h3 class="text-muted">{{ trans('entities.chapters_popular') }}</h3>
                @include('partials.entity-list', ['entities' => Views::getPopular(10, 0, [\BookStack\Chapter::class]), 'style' => 'compact'])
            </div>
        </div>
    @endif
</div>

@stop