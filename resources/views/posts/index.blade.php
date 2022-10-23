@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<form action="post/create" method="POST">
    @csrf
        <div class="form-group">
            <input type="text" name="newPost" class="form-control" placeholder="投稿内容" required>
        </div>
        <input type="image" id="image" src="images/post.png">
</form>

            @foreach ($list as $list)
            <div>
                <p>{{ $list->post }}</p>
                <p>{{ $list->created_at }}</p>
                <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
                <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            </div>
            @endforeach




@endsection
