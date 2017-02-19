
<div class="form-group">
    <label for="title">Name</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $author->name ?: '') }}">
    <span class="error text-danger">{{ implode(',', $errors->get('name')) }}</span>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>