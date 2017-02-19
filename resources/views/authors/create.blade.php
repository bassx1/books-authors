@extends('app')

@section('content')

    <h1>Create new author</h1>
    <br>

    <form action="{{ route('authors.store') }}" method="POST">

        {{ csrf_field() }}

        @include('authors.form')

    </form>

@endsection