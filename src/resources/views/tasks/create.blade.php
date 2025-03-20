<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>
    <h1>Add Task</h1>
    <a href="{{ route('tasks.index') }}">Back</a>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <p><input type="text" name="title" placeholder="Task title" required></p>
        <p><input type="checkbox" name="completed" value="1"> Completed</p>
        <button type="submit">Save</button>
    </form>
</body>
</html>