<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $book->title ?: '') }}">
    <span class="error text-danger">{{ implode(',', $errors->get('title')) }}</span>
</div>

<div class="form-group">
    <label for="subtitle">Subtitle</label>
    <textarea name="subtitle" id="subtitle" rows="10"
              class="form-control">{{ old('subtitle', $book->subtitle ?: '') }}</textarea>
    <span class="error text-danger">{{ implode(',', $errors->get('subtitle')) }}</span>
</div>

<div class="form-group">
    <label for="isbn">ISBN</label>
    <input type="text" id="isbn" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?: '') }}">
    <span class="error text-danger">{{ implode(',', $errors->get('isbn')) }}</span>
</div>


<div class="form-group">
    <label for="isbn">Author</label>
    <select name="authors[]" id="authors" class="form-control" multiple>
        @foreach($authors as $author)
            <option value="{{ $author->id }}"
                    {{ isset($book->authors) && in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>


@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('#authors').select2();
</script>
@endpush