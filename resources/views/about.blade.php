@extends('layouts.default')

@section('content')
<h2>About Page</h2>
@foreach ($data as $key => $value)
<div>{{ $key . ' = '. $value }}</div>
@endforeach
@endsection