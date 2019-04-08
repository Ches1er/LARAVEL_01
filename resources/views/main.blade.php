@extends("layouts.main")
@section("title","Main")
@section("content")
    <ul>
    @if(!empty($posts))
        @foreach($posts as $post)
            <li>{{$post->name}}</li>
            <li>{{$post->content}}
                <form action="{{route("delpost",["postid"=>$post->id])}}" method="post">
                    @csrf
                    @method("delete")
                    <input type="submit" value="Del">
                </form>
            </li>
            @endforeach
    @else
    <li>Empty</li>
    @endif
    </ul>
    @dd($post_exist)

    <form action="/addpost" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="content">Content</label>
        <textarea name="content" id="" cols="30" rows="3"></textarea>
        <input type="submit" value="Add">
    </form>
@endsection
