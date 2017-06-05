<div class="chapter entity-list-item" data-entity-type="chapter" data-entity-id="{{$chapter->id}}">
    <h4>
        @if (isset($showPath) && $showPath)
            <a href="{{ $chapter->book->getUrl() }}" class="text-book">
                <i class="fa fa-book"></i>{{ $chapter->book->name }}
            </a>
            <span class="text-muted">&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</span>
        @endif
            <i class="fa fa-files-o"></i><span class="entity-list-item-name">{{ $chapter->name }}</span>
        </a>
    </h4>
    @if(isset($chapter->searchSnippet))
        <p class="text-muted">{!! $chapter->searchSnippet !!}</p>
    @else
        <p class="text-muted">{{ $chapter->getExcerpt() }}</p>
    @endif

    @if(!isset($hidePages) && count($chapter->pages) > 0)
        <p class="text-muted chapter-toggle"><i class="fa fa-caret-right"></i> <i class="fa fa-file-text-o"></i> <span>{{ trans('entities.x_pages', ['count' => $chapter->pages->count()]) }}</span></p>
        <div class="inset-list">
            @foreach($chapter->pages as $page)
                <h5 class="@if($page->draft) draft @endif"><a href="{{ $page->getUrl() }}" class="text-page @if($page->draft) draft @endif"><i class="fa fa-file-text-o"></i>{{$page->name}}</a></h5>
            @endforeach
        </div>
    @endif
</div>
