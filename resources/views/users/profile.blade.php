@extends('base')

@section('content')

    <div class="container" ng-non-bindable>
        <div class="row">
            <div class="col-sm-7">

                <div class="padded-top large"></div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="clearfix">
                            <div class="padded-right float left">
                                <img class="avatar square huge" src="https://secure.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?d=retro&r=x&s=200" alt="{{ $user->name }}">
                            </div>
                            <div>
                                <h3 style="margin-top:0">{{ $user->name }}&nbsp;<img style="height:25px" src="{{ cdnUrl() }}/images/badge.png"></img></h3>
                                <p class="text-muted">
                                    <i style="color:rgb(142, 204, 76)" class="fa fa-clock-o"></i>{{ trans('entities.profile_user_for_x', ['time' => $user->created_at->diffForHumans(null, true)]) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 text-bigger" id="content-counts">
                        <div class="text-muted">{{ trans('entities.profile_created_content') }}</div>
                        <div class="text-book">
                            <i class="fa fa-book fa-hc-fw"></i> {{ $assetCounts['books'] }} {{ str_plural(trans('entities.book'), $assetCounts['books']) }}
                        </div>
                        <div class="text-chapter">
                            <i class="fa fa-files-o fa-hc-fw"></i> {{ $assetCounts['chapters'] }} {{ str_plural(trans('entities.chapter'), $assetCounts['chapters']) }}
                        </div>
                        <div class="text-page">
                            <i class="fa fa-file-text fa-hc-fw"></i> {{ $assetCounts['pages'] }} {{ str_plural(trans('entities.page'), $assetCounts['pages']) }}
                        </div>
                    </div>
                </div>


                <hr class="even">

                <h3>{{ trans('entities.recently_created_pages') }}</h3>
                @if (count($recentlyCreated['pages']) > 0)
                    @include('partials/entity-list', ['entities' => $recentlyCreated['pages']])
                @else
                    <p class="text-muted">{{ trans('entities.profile_not_created_pages', ['userName' => $user->name]) }}</p>
                @endif

                <hr class="even">

                <h3>{{ trans('entities.recently_created_chapters') }}</h3>
                @if (count($recentlyCreated['chapters']) > 0)
                    @include('partials/entity-list', ['entities' => $recentlyCreated['chapters']])
                @else
                    <p class="text-muted">{{ trans('entities.profile_not_created_chapters', ['userName' => $user->name]) }}</p>
                @endif

                <hr class="even">

                <h3>{{ trans('entities.recently_created_books') }}</h3>
                @if (count($recentlyCreated['books']) > 0)
                    @include('partials/entity-list', ['entities' => $recentlyCreated['books']])
                @else
                    <p class="text-muted">{{ trans('entities.profile_not_created_books', ['userName' => $user->name]) }}</p>
                @endif
            </div>

            <div class="col-sm-4 col-sm-offset-1" id="recent-activity">
                <h3>{{ trans('entities.recent_activity') }}</h3>
                @include('partials/activity-list', ['activity' => $activity])
            </div>

        </div>
    </div>


@stop