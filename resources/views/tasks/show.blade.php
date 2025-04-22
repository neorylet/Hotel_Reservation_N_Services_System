<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
  <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">📄 Task Details</h1>

    <div class="space-y-6">
      <div>
        <h2 class="text-2xl font-semibold text-gray-900">{{ $task->title }}</h2>
      </div>

      <div>
        <p class="text-gray-700 leading-relaxed">{{ $task->description }}</p>
      </div>

      <div class="text-sm text-gray-600">
        <span class="font-medium">Completed:</span>
        <span class="{{ $task->is_completed ? 'text-green-600 font-semibold' : 'text-red-500 font-semibold' }}">
          {{ $task->is_completed ? 'Yes' : 'No' }}
        </span>
      </div>

      <div class="text-sm text-gray-600">
        <span class="font-medium">Created At:</span> {{ $task->created_at }}
      </div>

      <div class="text-sm text-gray-600">
        <span class="font-medium">Updated At:</span> {{ $task->updated_at }}
      </div>

      <div class="pt-4">
        <a href="{{ route('tasks.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg shadow transition">
          🔙 Back to List
        </a>
      </div>
    </div>
  </div>
</body>
</html>
