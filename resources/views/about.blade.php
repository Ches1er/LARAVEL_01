@extends("layouts.main")

@section("title","About blog")
@section("content")
    <h3>About {{$author}} blog</h3>
    @foreach($authors as $author)
        @if($loop->first)
            <p>first author</p>
        @endif
        @if($loop->last)
            <p>second author</p>
        @endif
        <p>{{$author}}</p>
    @endforeach
@endsection