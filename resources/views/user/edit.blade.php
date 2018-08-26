@extends('layouts.app')

@section('title','Edit')

@section('content')

<table>
    <form action="/user/edit" method="post">
        {{ csrf_field() }}
        <tr>
            <th>名前</th><td><input type="text" name="name" value="{{ old( 'name',$user->name) }}"></td>
        </tr>
        <tr>
            <th>メール</th><td><input type="email" name="email" value="{{ old('email',$user->email)}}"></td>
        </tr>
        <tr>
            <th>プロフィール画像</th><td> <input type="file" class="form-control" name="files[][photo]" multiple></td>
        </tr>
        <tr>
            <th>BIO</th><td><textarea name="bio">{{ 'bio',$user->bio }}</textarea></td>
        </tr>
        <tr>
            <th></th><td><input type="submit" value="send" ></td>
        </tr>
    </form>
</table>


@endsection
