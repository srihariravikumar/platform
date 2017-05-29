@extends('base')

@section('content')

    <div class="faded-small toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 faded">
                    <div class="action-buttons text-left">
                        <a data-action="expand-entity-list-details" class="text-primary text-button"><i class="zmdi zmdi-wrap-text"></i>{{ trans('common.toggle_details') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">

    @if (setting('app-public') || !user()->isDefault())

        <div class="row">
            <div class="col-md-4">
                @if(count($draftPages) > 0)
                    <h4>{{ trans('entities.my_recent_drafts') }}</h4>
                    @include('partials/entity-list', ['entities' => $draftPages, 'style' => 'compact'])
                @endif
                @if($signedIn)
                    <h4><i style="color:#7E57C2" class="zmdi zmdi-calendar-check"></i> {{ trans('entities.my_recently_viewed') }}</h4>
                @else
                    <h4><i style="color:#7E57C2" class="zmdi zmdi-time-restore"></i> {{ trans('entities.books_recent') }}</h4>
                @endif
                @include('partials/entity-list', [
                'entities' => $recents,
                'style' => 'compact',
                'emptyText' => $signedIn ? trans('entities.no_pages_viewed') : trans('entities.books_empty')
                ])
            </div>
            <div class="col-md-4">
                <h4 class="text-muted"><i style="color:#F05330" class="zmdi zmdi-trending-up"></i> {{ trans('entities.pages_popular') }}</h4>
                @include('partials.entity-list', ['entities' => Views::getPopular(10, 0, [\BookStack\Page::class]), 'style' => 'compact'])
            </div>
            <div class="col-md-4">
                <h4 class="text-muted"><i style="color:#F05330" class="zmdi zmdi-trending-up"></i> {{ trans('entities.books_popular') }}</h4>
                @include('partials.entity-list', ['entities' => Views::getPopular(5, 0, [\BookStack\Book::class]), 'style' => 'compact'])

                <h4><a class="no-color" href="{{ baseUrl("/pages/recently-created") }}"><i class="zmdi zmdi-time-restore"></i> {{ trans('entities.recently_created_pages') }}</a></h4>
                <div id="recently-created-pages">
                    @include('partials/entity-list', [
                    'entities' => $recentlyCreatedPages,
                    'style' => 'compact',
                    'emptyText' => trans('entities.no_pages_recently_created')
                    ])

                </div>
            </div>
        </div>
    @endif
</div>

@stop