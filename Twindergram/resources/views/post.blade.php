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
    
    <div class="border border-primary mt-3 col-5 mx-auto" >

        <h4>{{$post->user->name}}</h4>
        <p><small>{{$post->created_at}}</small></p>
        <p>{{$post->text}}</p>

    </div>

    <div class="border border-dark mt-3 col-5 mx-auto" >
        <form action="{{ url('newComment/'.$post->id)}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
            <div class="form-group">
                <h5 class="mt-1">New comment</h5>

                <div >
                    <input type="text" name="commentText" id="Comment-text" class="form-control" value="">
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus"></i>Add Comment
                    </button>
                </div>
            </div>

        </form>
    </div>
    @foreach($post->comments as $comment)
    <div class="border border-warning mt-3 col-5 mx-auto" >

        <h4>{{$comment->user->name}}</h4>
        <p><small>{{$comment->created_at}}</small></p>
        <p>{{$comment->text}}</p>

    </div>
    @endforeach
</body>
</html>