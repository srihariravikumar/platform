<div class="breadcrumbs">
    @if (userCan('view', $page->book))
        <a href="{{ $page->book->getUrl() }}" class="text-book text-button"><i class="fa fa-book"></i>{{ $page->book->getShortName() }}</a>
        <img src="https://cdn.jsdelivr.net/npm/doctub/images/arrow.svg" style="height:11px;margin-bottom:-1px"> 
    @endif
    @if($page->hasChapter() && userCan('view', $page->chapter))
        <a href="{{ $page->chapter->getUrl() }}" class="text-chapter text-button">
            <i class="fa fa-bookmark"></i>
            {{ $page->chapter->getShortName() }}
        </a>
        <img src="https://cdn.jsdelivr.net/npm/doctub/images/arrow.svg" style="height:11px;margin-bottom:-1px"> 
    @endif
    <a href="{{ $page->getUrl() }}" class="text-page text-button"><i class="fa fa-file-text"></i>{{ $page->getShortName() }}</a>
</div>
