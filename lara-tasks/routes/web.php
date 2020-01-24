<?php

use App\Task;
use Illuminate\Http\Request;

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});

Route::put('/task/{task}', function (Task $task) {
    $task->done = true;
    $task->update();

    return redirect('/');
});


Route::get('/', function () {
    //return "hello world";
    $tasks = Task::orderBy('created_at', 'asc')->get();
    $tasksDone = $tasks ->filter(function($value){
        return $value["done"]== true;
    });
    $tasksUndone = $tasks ->filter(function($value){
        return $value["done"]== false;
    });

    return view('tasks', [
        'tasks' => $tasks,
        'tasksDone' => $tasksDone,
        'tasksUndone' => $tasksUndone
    ]);

});



Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');

});