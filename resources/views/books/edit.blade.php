@extends('app')

@section('content')

    <h1>Edit "{{ $book->title }}" book</h1>
    <br>
    <form action="{{ route('books.update', $book->id) }}" method="POST">

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('books.form')

    </form>

@endsection