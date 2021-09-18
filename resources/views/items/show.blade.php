<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <p>
        <b>商品名：{{ $item->name }}</b>
    </p>

    <p>
        <b>商品詳細：{{ $item->description }}</b>
    </p>

    <p>
        <b>価格：{{ $item->price }}</b>
    </p>

    <p>
        <b>出品者：{{ $item->seller }}</b>
    </p>

    <p>
        <b>電子メール：{{ $item->email }}</b>
    </p>

    <p>
        <img src="{{ $item->image_url }}">
    </p>
    {{-- <a href="/items/{{ $item->id }}/edit">編集する</a> --}}
    <div class="button-group">
        <button type="button" onclick="location.href='/items/{{ $item->id }}/edit'">編集する</button>
        <form action="/items/{{ $item->id }}" method="post" id="delete-form">
            <input type="submit" value="削除する" onclick="if(!confirm('本当に削除しますか？')){return false};" form="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
</body>

</html>
