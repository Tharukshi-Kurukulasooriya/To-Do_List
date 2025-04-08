<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4 text-center">📝 To-Do List</h2>

    <form method="POST" action="/tasks" class="d-flex mb-4">
        @csrf
        <input type="text" name="title" class="form-control me-2" placeholder="What needs to be done?" required>
        <button class="btn btn-primary">Add</button>
    </form>

    @foreach($tasks as $task)
        <div class="d-flex justify-content-between align-items-center mb-2 p-3 bg-white shadow-sm rounded">
            <form method="POST" action="/tasks/{{ $task->id }}" style="display: inline-block">
                @csrf @method('PATCH')
                <button type="submit" class="btn btn-sm {{ $task->is_completed ? 'btn-success' : 'btn-outline-success' }}">
                    {{ $task->is_completed ? '✔️ Done' : 'Mark Done' }}
                </button>
            </form>

            <span class="{{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                {{ $task->title }}
            </span>

            <form method="POST" action="/tasks/{{ $task->id }}" style="display: inline-block">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">🗑️ Delete</button>
            </form>
        </div>
    @endforeach
</div>
</body>
</html>
