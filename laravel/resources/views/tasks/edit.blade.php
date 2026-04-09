<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Task</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Update task details</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 sm:p-8">
                <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Task Title
                        </label>
                        <input 
                            type="text" 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150" 
                            id="title" 
                            name="title" 
                            value="{{ $task->title }}" 
                            placeholder="Enter task title" 
                            required
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Description
                        </label>
                        <textarea 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150" 
                            id="description" 
                            name="description" 
                            rows="4"
                            placeholder="Enter task description"
                        >{{ $task->description }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Completed Checkbox -->
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            class="h-4 w-4 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 cursor-pointer" 
                            id="is_completed" 
                            name="is_completed" 
                            value="1"
                            {{ $task->is_completed ? 'checked' : '' }}
                        >
                        <label for="is_completed" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                            Mark as completed
                        </label>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-4">
                        <button 
                            type="submit" 
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200"
                        >
                            Update Task
                        </button>
                        <a 
                            href="{{ route('tasks.index') }}" 
                            class="flex-1 bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 text-center"
                        >
                            Back to Tasks
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>