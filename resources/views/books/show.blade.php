@extends('app')

@section('content')


    <h1>{{ $book->title }}</h1>
    <p>
        {{ $book->subtitle }}
    </p>

    @include('partials.go_back_btn')

@endsection