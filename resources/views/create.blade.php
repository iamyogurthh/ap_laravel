@extends("layouts.default")

@section('content')
<style>
.form-error {
    border: 1px solid red;
}
</style>
<div class="container">

    <div class="card">
        <h5 class="card-header" style="text-align: center;">New Post</h5>
        <div class="card-body">
            <form action="/posts" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control {{ $errors->first('name') ? "form-error": "" }}" name="name"
                        required value="{{ old('name') }}">
                    @error('name')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control {{ $errors->first('name') ? "form-error": "" }}"
                        name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                </div>

                <div class="form-group">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                </div><br>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts" class="btn btn-success">Back</a>
            </form>

        </div>
    </div>
</div>
@endsection