@extends('layouts.base-email')
@section('title')
    :: Impulse ::
@endsection
@section('styles')
@endsection
@section('content')
    <h1>Hi {{ $user->firstName }}</h1>
    <p>A new article has been published: <strong>{{ $article->title }}</strong> <br> by author <strong>{{ $article->user->firstName }}</strong></p>
@endsection
@section('scripts')
@endsection