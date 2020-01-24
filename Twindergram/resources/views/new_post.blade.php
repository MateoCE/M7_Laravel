<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>{{Auth::user()->name}}</p>

    <form action="{{ url('newPost')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="Post-text" class="col-sm-3 control-label">Post</label>

            <div class="col-sm-6">
                <input type="text" name="postText" id="Post-text" class="form-control" value="">
                <input type="hidden" name="postId" value="{{Auth::user()->id}}">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-btn fa-plus"></i>Add Post
                </button>
            </div>
        </div>
    </form>
</body>
</html>