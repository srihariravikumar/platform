<div class="page {{$page->draft ? 'draft' : ''}} entity-list-item" data-entity-type="page" data-entity-id="{{$page->id}}">
    <h4>
        <a href="{{ $page->getUrl() }}" class="text-page entity-list-item-link"><i class="fa fa-file-text"></i><span class="entity-list-item-name">{{ $page->name }}</span></a>
    </h4>

    @if(isset($page->searchSnippet))
        <p class="text-muted">{!! $page->searchSnippet !!}</p>
    @else
        <p class="text-muted">{{ $page->getExcerpt() }}</p>
    @endif

    @if(isset($style) && $style === 'detailed')
        <div class="row meta text-muted text-small">
            <div class="col-md-6">
                @include('partials.entity-meta', ['entity' => $page])
            </div>
            <div class="col-md-6">
                <a class="text-book" href="{{ $page->book->getUrl() }}"><i class="fa fa-book"></i>{{ $page->book->getShortName(30) }}</a>
                <br>
                @if($page->chapter)
                    <a class="text-chapter" href="{{ $page->chapter->getUrl() }}"><i class="fa fa-files-o"></i>{{ $page->chapter->getShortName(30) }}</a>
                @else
                    <i class="fa fa-files-o"></i> {{ trans('entities.pages_not_in_chapter') }}
                @endif
            </div>
        </div>
    @endif


</div>