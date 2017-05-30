@if(count($books) > 0)
    @foreach($books as $book)
        @include('books/list-item', ['book' => $book])
        <hr>
    @endforeach
    {!! $books->render() !!}
@else
    <p class="text-muted">{{ trans('entities.books_empty') }}</p>
    @if(userCan('books-create-all'))
        <a href="{{ baseUrl("/books/create") }}" class="text-pos"><i class="zmdi zmdi-edit"></i>{{ trans('entities.create_one_now') }}</a>
    @endif
@endif
