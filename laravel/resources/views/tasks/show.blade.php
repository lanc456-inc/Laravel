<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Task Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <p class="card-text"><strong>Completed:</strong> {{ $task->is_completed ? 'Yes' : 'No' }}</p>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</body>
</html>