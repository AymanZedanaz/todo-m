<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>

<body>
    <h1>To-Do List</h1>

    <!-- عرض قائمة المهام -->
    <ul>
        @foreach ($tasks as $task)
            <li>
                <form action="{{ route('tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label>
                        <input type="checkbox" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->title }}
                    </label>
                </form>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- إضافة مهمة جديدة -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="New Task">
        <button type="submit">Add Task</button>
    </form>
</body>

</html>
