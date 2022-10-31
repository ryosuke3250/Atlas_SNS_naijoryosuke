@extends('layouts.login')

@section('content')
<p>検索</p>
  <form action="/search" method="POST">
    {{csrf_field()}}
    <input type="search" name="search" value="" placeholder="ユーザー名">
    <button type="submit">検索</button>
    <p>{{ session('search')}}</p>
  </form>

@foreach($users as $user)
<tr>
  <td>{{$user->username}}</td>
</tr>
@endforeach


@endsection
