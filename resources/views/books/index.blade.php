@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Books list</h1>
        </div>
        <div class="col-md-4">
            <br>
            <a href="{{ route('books.create') }}" class="btn btn-success pull-right">Create book</a>
        </div>
    </div>

    @if (!count($books))
        <br>
        <h4>No books found... <a href="{{ route('books.create') }}">Create one!</a></h4>
    @endif

    @foreach($books as $book)


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $book->title }}</h3>
                </div>
                <div class="panel-body">
                    {{ $book->subtitle }}
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">

                            <a href="{{ route('books.show', $book->id) }}" class="pull-left">Go to this book</a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm pull-right">Remove</button>
                            </form>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success btn-sm pull-right" style="margin: 0 10px">Edit</a>

                        </div>
                    </div>
                </div>
            </div>

    @endforeach

@endsection