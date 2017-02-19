@extends('app')

@section('content')


    <h1>{{ $author->name }}</h1>


    <div class="row">
        <div class="col-xs-12">
            @if (count($author->books))
                <h4>{{ count($author->books) }} {{ count($author->books) > 1 ? 'works' : 'work' }}:</h4>
                <br>
                <div>
                    @foreach($author->books as $book)
                        <h5>
                            <a href="{{ route('books.show', $book->id) }}">
                                <b>{{ $book->title }}</b>
                            </a>
                        </h5>
                        <p>{{ $book->subtitle }}</p>
                        <hr>
                    @endforeach
                </div>
            @else
                <p>This author does not have any books yet</p>
            @endif
            <br>
            <br>
        </div>
    </div>

    @include('partials.go_back_btn')




@endsection