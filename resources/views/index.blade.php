@extends('layouts.app')

@section('title','Index')


@section('content')

{{-- ログインユーザー情報 --}}
<h3>ログインユーザー情報</h3>
<table>
    <tr>
        <th>Name</th><td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email</th><td>{{ $user->email }}</td>
    </tr>
</table>




{{-- ログアウトボタン --}}
<p><a href="users/logout">ログアウト</a></p>

{{-- 編集ボタン --}}
<p><a href="user/edit">ユーザー情報を編集</a></p>


@endsection
