@extends('base')

@section('content')

    <div class="faded-small toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 faded">
                    @include('books._breadcrumbs', ['book' => $book])
                </div>
                <div class="col-sm-6">
                    <div class="action-buttons faded">
                        <span dropdown class="dropdown-container">
                            <iframe src="https://www.facebook.com/plugins/like.php?href={{ $book->getUrl('/') }}?&width=78&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=1893355314012092" width="78" height="21" style="border:none;overflow:hidden;margin-bottom:-6px" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            <div dropdown-toggle class="text-button text-primary"><i class="fa fa-external-link"></i>{{ trans('entities.export') }}</div>
                            <ul class="wide">
                                <li><a href="{{ $book->getUrl('/export/html') }}" target="_blank">{{ trans('entities.export_html') }} <span class="text-muted float right">.html</span></a></li>
                                <li><a href="{{ $book->getUrl('/export/pdf') }}" target="_blank">{{ trans('entities.export_pdf') }} <span class="text-muted float right">.pdf</span></a></li>
                                <li><a href="{{ $book->getUrl('/export/plaintext') }}" target="_blank">{{ trans('entities.export_text') }} <span class="text-muted float right">.txt</span></a></li>
                            </ul>
                        </span>
                        @if(userCan('page-create', $book))
                            <a href="{{ $book->getUrl('/page/create') }}" class="text-pos text-button"><i class="fa fa-plus"></i>{{ trans('entities.pages_new') }}</a>
                        @endif
                        @if(userCan('chapter-create', $book))
                            <a href="{{ $book->getUrl('/chapter/create') }}" class="text-pos text-button"><i class="fa fa-plus"></i>{{ trans('entities.chapters_new') }}</a>
                        @endif
                        @if(userCan('book-update', $book))
                            <a href="{{$book->getEditUrl()}}" class="text-primary text-button"><i class="fa fa-pencil"></i>{{ trans('common.edit') }}</a>
                        @endif
                        @if(userCan('book-update', $book) || userCan('restrictions-manage', $book) || userCan('book-delete', $book))
                            <div dropdown class="dropdown-container">
                                <a dropdown-toggle class="text-primary text-button"><i class="fa fa-ellipsis-v"></i></a>
                                <ul>
                                    @if(userCan('book-update', $book))
                                        <li><a href="{{ $book->getUrl('/sort') }}" class="text-primary"><i class="fa fa-sort"></i>{{ trans('common.sort') }}</a></li>
                                    @endif
                                    @if(userCan('restrictions-manage', $book))
                                        <li><a href="{{ $book->getUrl('/permissions') }}" class="text-primary"><i class="fa fa-lock"></i>{{ trans('entities.permissions') }}</a></li>
                                    @endif
                                    @if(userCan('book-delete', $book))
                                        <li><a href="{{ $book->getUrl('/delete') }}" class="text-neg"><i class="fa fa-trash"></i>{{ trans('common.delete') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="entity-dashboard" entity-id="{{ $book->id }}" entity-type="book">
        <div class="row">
            <div class="col-md-7">

                <h1>{{$book->name}}</h1>
                <div class="book-content" v-if="!searching">
                    <p class="text-muted" v-pre>{{$book->description}}</p>

                    <div class="page-list" v-pre>
                        <hr>
                        @if(count($bookChildren) > 0)
                            @foreach($bookChildren as $childElement)
                                @if($childElement->isA('chapter'))
                                    @include('chapters/list-item', ['chapter' => $childElement])
                                @else
                                    @include('pages/list-item', ['page' => $childElement])
                                @endif
                                <hr>
                            @endforeach
                        @else
                            <p class="text-muted">{{ trans('entities.books_empty_contents') }}</p>
                            <p>
                                <a href="{{ $book->getUrl('/page/create') }}" class="text-page"><i class="fa fa-file-text"></i>{{ trans('entities.books_empty_create_page') }}</a>
                                &nbsp;&nbsp;<em class="text-muted">-{{ trans('entities.books_empty_or') }}-</em>&nbsp;&nbsp;&nbsp;
                                <a href="{{ $book->getUrl('/chapter/create') }}" class="text-chapter"><i class="fa fa-files-o"></i>{{ trans('entities.books_empty_add_chapter') }}</a>
                            </p>
                            <hr>
                        @endif
                        @include('partials.entity-meta', ['entity' => $book])
                    </div>
                </div>
                <div class="search-results" v-cloak v-if="searching">
                    <h3 class="text-muted">{{ trans('entities.search_results') }} <a v-if="searching" v-on:click="clearSearch()" class="text-small"><i class="fa fa-close"></i>{{ trans('entities.search_clear') }}</a></h3>
                    <div v-if="!searchResults">
                        @include('partials/loading-icon')
                    </div>
                    <div v-html="searchResults"></div>
                </div>


            </div>

            <div class="col-md-4 col-md-offset-1">
                <div class="margin-top large"></div>

                @if($book->restricted)
                    <p class="text-muted">
                        @if(userCan('restrictions-manage', $book))
                            <a href="{{ $book->getUrl('/permissions') }}"><i class="fa fa-lock"></i>{{ trans('entities.books_permissions_active') }}</a>
                        @else
                            <i class="fa fa-lock-outline"></i>{{ trans('entities.books_permissions_active') }}
                        @endif
                    </p>
                @endif

                <div class="search-box">
                    <form v-on:submit="searchBook">
                        <input v-model="searchTerm" v-on:change="checkSearchForm()" type="text" name="term" placeholder="{{ trans('entities.books_search_this') }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <button v-if="searching" v-cloak class="text-neg" v-on:click="clearSearch()" type="button"><i class="fa fa-times"></i></button>
                    </form>
                </div>

                <div class="activity">
                  <h3>QR Code &nbsp;<a href="https://chart.googleapis.com/chart?chs=547x547&cht=qr&chl={{ $book->getUrl('/') }}&choe=UTF-8"><i style="color:#0288d1" class="fa fa-download"></i></a></h3>
                    <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{ $book->getUrl('/') }}&choe=UTF-8">
                  <h3>Share on Social</h3>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_google_plus"></a>
                    </div>
                  <h3>{{ trans('entities.recent_activity') }}</h3>
                    @include('partials/activity-list', ['activity' => Activity::entityActivity($book, 10, 0)])
                </div>
            </div>
        </div>
    </div>
<script async src="{{ cdnUrl() }}/js/share.js"></script>
@stop
