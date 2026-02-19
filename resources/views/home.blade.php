@extends("layouts.default")

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header" style="text-align: center;">Contents</h5>
        @foreach ($data as $post )
        <div class="card-body">
            <h5 class="card-title">{{ $post->name }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <a href="#" class="btn btn-primary">View</a>
        </div>
        <hr>
        @endforeach

    </div>
</div>
@endsection