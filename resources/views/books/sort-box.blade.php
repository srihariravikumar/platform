<div class="sort-box" data-type="book" data-id="{{ $book->id }}" ng-non-bindable>
    <h3 class="text-book"><i class="fa fa-book"></i>{{ $book->name }}</h3>
    <ul class="sortable-page-list sort-list">
        @foreach($bookChildren as $bookChild)
            <li data-id="{{$bookChild->id}}" data-type="{{ $bookChild->getClassName() }}" class="text-{{ $bookChild->getClassName() }}">
                <i class="fa {{ $bookChild->isA('chapter') ? 'fa-files-o':'fa-file-text'}}"></i>{{ $bookChild->name }}
                @if($bookChild->isA('chapter'))
                    <ul>
                        @foreach($bookChild->pages as $page)
                            <li data-id="{{$page->id}}" class="text-page" data-type="page">
                                <i class="fa fa-file-text-o"></i>
                                {{ $page->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
