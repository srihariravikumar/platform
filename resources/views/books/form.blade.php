
{{ csrf_field() }}
<div class="form-group title-input">
    @include('form/text', ['name' => 'name', 'placeholder' => "Name"])
</div>

<div class="form-group description-input">
    <label for="description">{{ trans('common.description') }}</label>
    @include('form/textarea', ['name' => 'description', 'placeholder' => "escription"])
</div>

<div class="form-group">
    <a href="{{ isset($book) ? $book->getUrl() : baseUrl('/books') }}" class="button muted">{{ trans('common.cancel') }}</a>
    <button type="submit" class="button pos">{{ trans('entities.books_save') }}</button>
</div>