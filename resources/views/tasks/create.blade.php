<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>taskapp</title>
</head>
<body>
    <x-layout>
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">➕ Add New Task</h2>
        
            <form method="POST" action="/tasks">
                @csrf
        
                <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                </div>
        
                <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('due_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                </div>
        
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Task
                </button>
            </form>
        </div>
    </x-layout>
      
</body>
</html>