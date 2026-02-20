@extends("layouts.default")

@section('content')
<style>
.form-error {
    border: 1px solid red;
}
</style>
<div class="container">
    <div class="card">
        <h5 class="card-header" style="text-align: center;">Edit Post</h5>
        <div class="card-body">
            <form action="/posts/{{ $post->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old("name", $post->name) }}" type="text"
                        class="form-control {{ $errors->first('name') ? "form-error": "" }}" name="name" required>
                    @error('name')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control {{ $errors->first('name') ? "form-error": "" }}"
                        name="description" required>{{ old("description" , $post->description ) }}</textarea>
                    @error('description')
                    <br>
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts" class="btn btn-success">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection