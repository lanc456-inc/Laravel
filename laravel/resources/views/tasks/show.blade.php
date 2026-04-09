<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Task Details</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">View full task information</p>
            </div>

            <!-- Task Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <!-- Card Header with Status -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 sm:px-8 py-8">
                    <div class="flex items-start justify-between">
                        <h2 class="text-2xl sm:text-3xl font-bold text-white">{{ $task->title }}</h2>
                        @if($task->is_completed)
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100">
                                ✓ Completed
                            </span>
                        @else
                            <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-100">
                                ⏳ Pending
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Card Body -->
                <div class="px-6 sm:px-8 py-8 space-y-6">
                    <!-- Description Section -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Description</h3>
                        @if($task->description)
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-wrap">
                                {{ $task->description }}
                            </p>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 italic">No description provided</p>
                        @endif
                    </div>

                    <!-- Task Info Section -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div>
                            <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400">Task ID</h3>
                            <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">#{{ $task->id }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-600 dark:text-gray-400">Status</h3>
                            <p class="mt-1 text-lg font-semibold">
                                @if($task->is_completed)
                                    <span class="text-green-600 dark:text-green-400">Completed</span>
                                @else
                                    <span class="text-yellow-600 dark:text-yellow-400">Pending</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Footer with Actions -->
                <div class="bg-gray-50 dark:bg-gray-700 px-6 sm:px-8 py-6 flex gap-4">
                    <a 
                        href="{{ route('tasks.index') }}" 
                        class="flex-1 bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-900 dark:text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 text-center"
                    >
                        Back to Tasks
                    </a>
                    <a 
                        href="{{ route('tasks.edit', $task) }}" 
                        class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 text-center"
                    >
                        Edit Task
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>