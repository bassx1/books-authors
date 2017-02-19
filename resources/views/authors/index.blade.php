@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Authors list</h1>
        </div>
        <div class="col-md-4">
            <br>
            <a href="{{ route('authors.create') }}" class="btn btn-success pull-right">Create author</a>
        </div>
    </div>

    @if (!count($authors))
        <br>
        <h4>No authors found... <a href="{{ route('authors.create') }}">Create one!</a></h4>
    @endif

    @foreach($authors as $author)


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $author->name }}</h3>
                </div>
                <div class="panel-body">
                    @if (count($author->books))
                        <label>Books of author:</label>
                        @include('authors.partials.books_list', ['books' => $author->books])
                    @else
                        <p>This author does not have any books yet</p>
                    @endif
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">

                            <a href="{{ route('authors.show', $author->id) }}" class="pull-left">Go to this author</a>

                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm pull-right">Remove</button>
                            </form>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-success btn-sm pull-right" style="margin: 0 10px">Edit</a>

                        </div>
                    </div>
                </div>
            </div>

    @endforeach

@endsection