<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <!-- resources/views/tasks/edit.blade.php -->
    <x-layout>
        <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Edit Task</h2>

            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block font-medium">Title:</label>
                    <input type="text" name="title" id="title"
                        value="{{ old('title', $task->title) }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded mt-1">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block font-medium">Due Date:</label>
                    <input type="date" name="due_date" id="due_date"
                        value="{{ old('due_date', \Carbon\Carbon::parse($task->due_date)->format('Y-m-d')) }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded mt-1">
                    @error('due_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Task
                </button>
            </form>
        </div>
    </x-layout>


</body>
</html>