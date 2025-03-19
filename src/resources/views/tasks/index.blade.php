<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>
    <h1>Tasks</h1>
    <a href="{{ route('tasks.create') }}">Add Task</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <ul>
        @forelse($tasks as $task)
            <li>
                {{ $task->title }} (Completed: {{ $task->completed ? 'Yes' : 'No' }})
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </li>
        @empty
            <li>No tasks found.</li>
        @endforelse
    </ul>
</body>
</html>