@extends('layouts.login')

@section('content')
<p>検索</p>
<form action="post/search" method="POST">
    @csrf
        <div class="form-group">
            <input type="search" name="search" class="form-control" placeholder="ユーザー名">
        </div>
        <input type="image" id="image" src="images/post.png">
</form>


@endsection
