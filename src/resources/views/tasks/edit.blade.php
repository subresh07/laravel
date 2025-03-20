<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <a href="{{ route('tasks.index') }}">Back</a>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <p><input type="text" name="title" value="{{ $task->title }}" required></p>
        <p><input type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}> Completed</p>
        <button type="submit">Update</button>
    </form>
</body>
</html>