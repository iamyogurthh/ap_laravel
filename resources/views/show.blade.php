@extends("layouts.default")

@section('content')
<div class="container">

    <div class="card">
        <h5 class="card-header" style="text-align: center;">Contents</h5>
        <div class="card-body">
            <div>
                <h5 class="card-title">{{ $post->name }}</h5>
                <p class="card-text">{{ $post->description }}</p>
            </div>
            <hr>
            <div>
                <a href="/posts" class="btn btn-success">Back</a>
            </div><br>
        </div>
    </div>
</div>
@endsection