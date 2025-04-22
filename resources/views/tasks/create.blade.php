<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Task</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
  <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">🆕 Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input
          type="text"
          id="title"
          name="title"
          value="{{ old('title') }}"
          required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
        />
        @error('title')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea
          id="description"
          name="description"
          rows="4"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
        >{{ old('description') }}</textarea>
        @error('description')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="is_completed" class="block text-sm font-medium text-gray-700 mb-1">Completed</label>
        <select
          id="is_completed"
          name="is_completed"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
        >
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
        @error('is_completed')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-between">
        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg shadow transition"
        >
        💾 Create
        </button>
        <a
          href="{{ route('tasks.index') }}"
          class="text-gray-700 hover:text-gray-900 bg-gray-200 hover:bg-gray-300 px-5 py-2.5 rounded-lg transition"
        >
          Cancel
        </a>
      </div>
    </form>
  </div>
</body>
</html>
