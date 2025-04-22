<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
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
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $task->title }}" required>
                @error('title')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $task->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="is_completed" class="block text-gray-700 text-sm font-bold mb-2">Completed</label>
                <select name="is_completed" id="is_completed" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="0" {{ $task->is_completed ? '' : 'selected' }}>No</option>
                    <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Yes</option>
                </select>
                @error('is_completed')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Yf9c6wZ81z5Wpd+n4P4C5yv7d9CZEfWi6y+C6f7Fj6L6kkz9v9egyt6Jj8i5P6nBvXU9xC6qOPnzFeg==" crossorigin="anonymous"></script>
</body>
</html>
