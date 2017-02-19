<p>
    @foreach($books as $key => $book)
        <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>{{--
        --}}{{ $loop->last ? '' : ', '}}
    @endforeach
</p>