@extends('app')

@section('content')

    <h1>Edit "{{ $author->name }}" </h1>
    <br>

    <form action="{{ route('authors.update', $author->id) }}" method="POST">

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('authors.form')

    </form>

@endsection