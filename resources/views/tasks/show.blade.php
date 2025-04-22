<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-md max-w-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Task Details</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h5 class="text-2xl font-semibold text-gray-800 mb-4">{{ $task->title }}</h5>
            <p class="text-gray-700 leading-relaxed mb-4">{{ $task->description }}</p>
            <p class="text-gray-600 mb-2">
                <strong class="font-semibold">Completed:</strong> <span class="{{ $task->is_completed ? 'text-green-500' : 'text-red-500' }}">{{ $task->is_completed ? 'Yes' : 'No' }}</span>
            </p>
            <p class="text-gray-600 mb-2">
                <strong class="font-semibold">Created At:</strong> {{ $task->created_at }}
            </p>
            <p class="text-gray-600 mb-4">
                <strong class="font-semibold">Updated At:</strong> {{ $task->updated_at }}
            </p>
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to List</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Yf9c6wZ81z5Wpd+n4P4C5yv7d9CZEfWi6y+C6f7Fj6L6kkz9v9egyt6Jj8i5P6nBvXU9xC6qOPnzFeg==" crossorigin="anonymous"></script>
</body>
</html>
