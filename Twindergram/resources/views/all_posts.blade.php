<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Posts</title>
</head>
<body>
    @foreach($posts as $post)
    <div class="border border-primary mt-3 col-5 mx-auto" >

        <h4>{{$post->user->name}}</h4>
        <h6>{{$post->created_at}}</h6>
        <p>{{$post->text}}</p>
        <form action="{{ url('post/'.$post->id)}}" method="get">
        <button type="submit" class="btn btn-primary mb-1">View Post</button>
        
        </form>

    </div>
    @endforeach
</body>
</html>