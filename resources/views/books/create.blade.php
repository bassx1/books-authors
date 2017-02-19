@extends('app')

@section('content')

    <h1>Create new book</h1>
    <br>

    <form action="{{ route('books.store') }}" method="POST">

        {{ csrf_field() }}

        @include('books.form')

    </form>

@endsection