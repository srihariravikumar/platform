@extends('base')

@section('content')

    <div class="faded-small toolbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 faded">
                    @include('pages._breadcrumbs', ['page' => $page])
                </div>
                <div class="col-sm-6 faded">
                    <div class="action-buttons">
                        <span dropdown class="dropdown-container">
                            <iframe src="https://www.facebook.com/plugins/like.php?href={{ $book->getUrl('/') }}?&width=78&layout=button_count&action=like&size=small&show_faces=false&share=false&height=21&appId=1893355314012092" width="78" height="21" style="border:none;overflow:hidden;margin-bottom:-6px" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            <div dropdown-toggle class="text-button text-primary"><i class="fa fa-external-link"></i>{{ trans('entities.export') }}</div>
                            <ul class="wide">
                                <li><a href="{{ $page->getUrl('/export/html') }}" target="_blank">{{ trans('entities.export_html') }} <span class="text-muted float right">.html</span></a></li>
                                <li><a href="{{ $page->getUrl('/export/pdf') }}" target="_blank">{{ trans('entities.export_pdf') }} <span class="text-muted float right">.pdf</span></a></li>
                                <li><a href="{{ $page->getUrl('/export/plaintext') }}" target="_blank">{{ trans('entities.export_text') }} <span class="text-muted float right">.txt</span></a></li>
                            </ul>
                        </span>
                        @if(userCan('page-update', $page))
                            <a href="{{ $page->getUrl('/edit') }}" class="text-primary text-button" ><i class="fa fa-pencil"></i>{{ trans('common.edit') }}</a>
                        @endif
                        @if(userCan('page-update', $page) || userCan('restrictions-manage', $page) || userCan('page-delete', $page))
                            <div dropdown class="dropdown-container">
                                <a dropdown-toggle class="text-primary text-button"><i class="fa fa-ellipsis-v"></i></a>
                                <ul>
                                    @if(userCan('settings-manage', $page))
                                        <li><a href="{{ $page->getUrl('/move') }}" class="text-primary" ><i class="fa fa-folder"></i>{{ trans('common.move') }}</a></li>
                                    @endif
                                    @if(userCan('page-update', $page))
                                        <li><a href="{{ $page->getUrl('/revisions') }}" class="text-primary"><i class="fa fa-repeat"></i>{{ trans('entities.revisions') }}</a></li>
                                    @endif
                                    @if(userCan('restrictions-manage', $page))
                                        <li><a href="{{ $page->getUrl('/permissions') }}" class="text-primary"><i class="fa fa-lock"></i>{{ trans('entities.permissions') }}</a></li>
                                    @endif
                                    @if(userCan('page-delete', $page))
                                        <li><a href="{{ $page->getUrl('/delete') }}" class="text-neg"><i class="fa fa-trash"></i>{{ trans('common.delete') }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="page-show" ng-non-bindable>
        <div class="row">
            <div class="col-md-9 print-full-width">
                <div class="page-content">

                    <div class="pointer-container" id="pointer">
                        <div class="pointer anim">
                            <span class="icon text-primary"><i class="fa fa-link"></i></span>
                            <input readonly="readonly" type="text" id="pointer-url" placeholder="url">
                            <button class="button icon" data-clipboard-target="https://api-ssl.bitly.com/v3/shorten?access_token=b6b3fa5f8743643f7d50a36d3c275de8a4c63188&longUrl=https://google.com?&format=txt" type="button" title="{{ trans('entities.pages_copy_link') }}"><i class="fa fa-clipboard"></i></button>
                        </div>
                    </div>

                    @include('pages/page-display')

                    <hr>

                    @include('partials.entity-meta', ['entity' => $page])

                </div>
            </div>

            <div class="col-md-3 print-hidden">
                <div class="margin-top large"></div>
                @if($book->restricted || ($page->chapter && $page->chapter->restricted) || $page->restricted)
                    <div class="text-muted">

                        @if($book->restricted)
                            @if(userCan('restrictions-manage', $book))
                                <a href="{{ $book->getUrl('/permissions') }}"><i class="fa fa-lock"></i>{{ trans('entities.books_permissions_active') }}</a>
                            @else
                                <i class="fa fa-lock"></i>{{ trans('entities.books_permissions_active') }}
                            @endif
                            <br>
                        @endif

                        @if($page->chapter && $page->chapter->restricted)
                            @if(userCan('restrictions-manage', $page->chapter))
                                <a href="{{ $page->chapter->getUrl('/permissions') }}"><i class="fa fa-lock"></i>{{ trans('entities.chapters_permissions_active') }}</a>
                            @else
                                <i class="fa fa-lock"></i>{{ trans('entities.chapters_permissions_active') }}
                            @endif
                            <br>
                        @endif

                        @if($page->restricted)
                            @if(userCan('restrictions-manage', $page))
                                <a href="{{ $page->getUrl('/permissions') }}"><i class="fa fa-lock"></i>{{ trans('entities.pages_permissions_active') }}</a>
                            @else
                                <i class="fa fa-lock"></i>{{ trans('entities.pages_permissions_active') }}
                            @endif
                            <br>
                        @endif
                    </div>
                @endif



                @include('pages/sidebar-tree-list', ['book' => $book, 'sidebarTree' => $sidebarTree, 'pageNav' => $pageNav])
            </div>

        </div>
    </div>
    @include('partials/highlight')
@stop

@section('scripts')
    <script>
        setupPageShow({{$page->id}});
    </script>
@stop
