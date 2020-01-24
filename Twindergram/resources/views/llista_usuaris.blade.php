<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuaris</title>
</head>
<body>

    <h1>Usuaris</h1>
    
    @foreach($users as $user)
    <li>{{$user->name}} - nposts = {{$user->posts->count()}} - ncomments = {{$user->comments->count()}}  </li>
        <li>
            <ol>
            @foreach($user->posts as $post)
                <li>{{$post->text}}</li>
            @endforeach
            </ol>
        </li>
    @endforeach

    
</body>
</html>