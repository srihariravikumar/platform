@extends('base')

@section('content')

    <div class="faded-small toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 faded" ng-non-bindable>
                    @include('chapters._breadcrumbs', ['chapter' => $chapter])
                </div>
                <div class="col-sm-4 faded">
                    <div class="action-buttons">
                        <span dropdown class="dropdown-container">
                            <iframe src="https://www.facebook.com/plugins/like.php?href={{ $book->getUrl('/') }}?&width=78&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=1893355314012092" width="78" height="21" style="border:none;overflow:hidden;margin-bottom:-6px" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            <div dropdown-toggle class="text-button text-primary"><i class="fa fa-external-link"></i>{{ trans('entities.export') }}</div>
                            <ul class="wide">
                                <li><a href="{{ $chapter->getUrl('/export/html') }}" target="_blank">{{ trans('entities.export_html') }} <span class="text-muted float right">.html</span></a></li>
                                <li><a href="{{ $chapter->getUrl('/export/pdf') }}" target="_blank">{{ trans('entities.export_pdf') }} <span class="text-muted float right">.pdf</span></a></li>
                                <li><a href="{{ $chapter->getUrl('/export/plaintext') }}" target="_blank">{{ trans('entities.export_text') }} <span class="text-muted float right">.txt</span></a></li>
                            </ul>
                        </span>
                        @if(userCan('page-create', $chapter))
                            <a href="{{ $chapter->getUrl('/create-page') }}" class="text-pos text-button"><i class="fa fa-plus"></i>{{ trans('entities.pages_new') }}</a>
                        @endif
                        @if(userCan('chapter-update', $chapter))
                            <a href="{{ $chapter->getUrl('/edit') }}" class="text-primary text-button"><i class="fa fa-pencil"></i>{{ trans('common.edit') }}</a>
                        @endif
                        @if(userCan('chapter-update', $chapter) || userCan('restrictions-manage', $chapter) || userCan('chapter-delete', $chapter))
                            <div dropdown class="dropdown-container">
                                <a dropdown-toggle class="text-primary text-button"><i class="fa fa-ellipsis-v"></i></a>
                                <ul>
                                    @if(userCan('chapter-update', $chapter))
                                        <li><a href="{{ $chapter->getUrl('/move') }}" class="text-primary"><i class="fa fa-folder"></i>{{ trans('common.move') }}</a></li>
                                    @endif
                                    @if(userCan('restrictions-manage', $chapter))
                                        <li><a href="{{ $chapter->getUrl('/permissions') }}" class="text-primary"><i class="fa fa-lock"></i>{{ trans('entities.permissions') }}</a></li>
                                    @endif
                                    @if(userCan('chapter-delete', $chapter))
                                        <li><a href="{{ $chapter->getUrl('/delete') }}" class="text-neg"><i class="fa fa-trash"></i>{{ trans('common.delete') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="entity-dashboard" entity-id="{{ $chapter->id }}" entity-type="chapter">
        <div class="row">
            <div class="col-md-7">
                <h1>{{ $chapter->name }}</h1>
                <div class="chapter-content" v-if="!searching">
                    <p class="text-muted">{{ $chapter->description }}</p>

                    @if(count($pages) > 0)
                        <div class="page-list">
                            <hr>
                            @foreach($pages as $page)
                                @include('pages/list-item', ['page' => $page])
                                <hr>
                            @endforeach
                        </div>
                    @else
                        <hr>
                        <p class="text-muted">{{ trans('entities.chapters_empty') }}</p>
                        <p>
                            @if(userCan('page-create', $chapter))
                                <a href="{{ $chapter->getUrl('/create-page') }}" class="text-page"><i class="fa fa-file-text"></i>{{ trans('entities.books_empty_create_page') }}</a>
                            @endif
                            @if(userCan('page-create', $chapter) && userCan('book-update', $book))
                                &nbsp;&nbsp;<em class="text-muted">-{{ trans('entities.books_empty_or') }}-</em>&nbsp;&nbsp;&nbsp;
                            @endif
                            @if(userCan('book-update', $book))
                                <a href="{{ $book->getUrl('/sort') }}" class="text-book"><i class="fa fa-book"></i>{{ trans('entities.books_empty_sort_current_book') }}</a>
                            @endif
                        </p>
                        <hr>
                    @endif

                    @include('partials.entity-meta', ['entity' => $chapter])
                </div>

                <div class="search-results" v-cloak v-if="searching">
                    <h3 class="text-muted">{{ trans('entities.search_results') }} <a v-if="searching" v-on:click="clearSearch()" class="text-small"><i class="fa fa-times"></i>{{ trans('entities.search_clear') }}</a></h3>
                    <div v-if="!searchResults">
                        @include('partials/loading-icon')
                    </div>
                    <div v-html="searchResults"></div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <div class="margin-top large"></div>
                @if($book->restricted || $chapter->restricted)
                    <div class="text-muted">

                        @if($book->restricted)
                            <p class="text-muted">
                                @if(userCan('restrictions-manage', $book))
                                    <a href="{{ $book->getUrl('/permissions') }}"><i class="fa fa-lock"></i>{{ trans('entities.books_permissions_active') }}</a>
                                @else
                                    <i class="fa fa-lock"></i>{{ trans('entities.books_permissions_active') }}
                                @endif
                            </p>
                        @endif

                        @if($chapter->restricted)
                            @if(userCan('restrictions-manage', $chapter))
                                <a href="{{ $chapter->getUrl('/permissions') }}"><i class="fa fa-lock"></i>{{ trans('entities.chapters_permissions_active') }}</a>
                            @else
                                <i class="fa fa-lock"></i>{{ trans('entities.chapters_permissions_active') }}
                            @endif
                        @endif
                    </div>
                @endif

                <div class="search-box">
                    <form v-on:submit="searchBook">
                        <input v-model="searchTerm" v-on:change="checkSearchForm()" type="text" name="term" placeholder="{{ trans('entities.chapters_search_this') }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <button v-if="searching" v-cloak class="text-neg" v-on:click="clearSearch()" type="button"><i class="fa fa-times"></i></button>
                    </form>
                </div>

                @include('pages/sidebar-tree-list', ['book' => $book, 'sidebarTree' => $sidebarTree])

            </div>
        </div>
    </div>




@stop
