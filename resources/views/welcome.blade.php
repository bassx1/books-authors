@extends('app')

@section('content')

    <div class="flex-center position-ref full-height">

        <div class="content welcome">
            <div class="container">
                <h1>Welcome to my books catalog!<br>
                    Feel free to add/edit or even remove books and authors.</h1>

                <div>
                    <p><b>Check out our awesome API!</b></p>
                    <p><a href="{{ url('api/books') }}" target="_blank">{{ url('api/books') }}</a> &mdash; get all books with authors.</p>
                    <p><a href="{{ url('api/authors') }}" target="_blank">{{ url('api/authors') }}</a> &mdash; get all authors with their books.</p>
                    <p>Amazing!</p>
                </div>
            </div>


        </div>
    </div>


@endsection