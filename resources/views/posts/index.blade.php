<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Список постов</h1>
    <ul>
        <li>
            <a href="{{ route('posts.show', ['slug' => 1]) }}">Post 1</a>
            <a href="{{ route('posts.edit', ['slug' => 1]) }}">Edit</a>
            <form action="{{ route('posts.destroy', ['slug' => 1] ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>

        </li>
        <li>
            <a href="{{ route('posts.show', ['slug' => 2]) }}">Post 2</a>
            <a href="{{ route('posts.edit', ['slug' => 2]) }}">Edit</a>

        </li>
        <li>
            <a href="{{ route('posts.show', ['slug' => 3]) }}">Post 3</a>
            <a href="{{ route('posts.edit', ['slug' => 3]) }}">Edit</a>

        </li>
    </ul>
</body>
</html>