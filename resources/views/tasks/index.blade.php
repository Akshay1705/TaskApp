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
    <x-layout>
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
          <h2 class="text-2xl font-bold mb-4">📋 Task List</h2>
      
          @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
              {{ session('success') }}
            </div>
          @endif
      
          <a href="/tasks/create" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            ➕ Add New Task
          </a>
      
          <ul class="divide-y divide-gray-200">
            @forelse($tasks as $task)
              <li class="py-2 flex justify-between items-center">
                <div>
                  <p class="font-medium">{{ $task->title }}</p>
                  <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') ?? 'No due date' }}</p>
                </div>
                <div class="flex gap-2">
                  <a href="/tasks/{{ $task->id }}/edit" class="text-blue-600 hover:underline">Edit</a>
                  <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline" onclick="return confirm('Delete this task?')">Delete</button>
                  </form>
                </div>
              </li>
            @empty
              <li class="py-4 text-gray-500">No tasks yet.</li>
            @endforelse
          </ul>
        </div>
    </x-layout>
</body>
</html>