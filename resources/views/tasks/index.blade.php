<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Task List</h1>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Task</a>

        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Title</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Description</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Completed</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($tasks as $task)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $task->title }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $task->description }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $task->is_completed ? 'Yes' : 'No' }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex space-x-2">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-3 rounded text-sm">View</a>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-3 rounded text-sm">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Yf9c6wZ81z5Wpd+n4P4C5yv7d9CZEfWi6y+C6f7Fj6L6kkz9v9egyt6Jj8i5P6nBvXU9xC6qOPnzFeg==" crossorigin="anonymous"></script>
</body>
</html>
