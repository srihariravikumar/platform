
{{ csrf_field() }}
<div class="form-group title-input">
    <label for="name"><i class="fa fa-book fa-fw"></i>{{ trans('common.name') }}</label>
    @include('form/text', ['name' => 'name'])
</div>

<div class="form-group description-input">
    <label for="description"><i class="fa fa-info-circle fa-fw">{{ trans('common.description') }}</label>
    @include('form/textarea', ['name' => 'description'])
</div>

<div class="form-group">
    <a href="{{ isset($book) ? $book->getUrl() : baseUrl('/books') }}" class="button muted">{{ trans('common.cancel') }}</a>
    <button type="submit" class="button pos">{{ trans('entities.books_save') }}</button>
</div>