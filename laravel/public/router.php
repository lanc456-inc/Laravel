<?php
// Simple router for displaying Tailwind CSS styled Blade files

$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_path = str_replace('/laravel/public', '', $request_path);
$request_path = ltrim($request_path, '/');

// Dummy data for demonstration
$tasks = [
    (object)['id' => 1, 'title' => 'Learn Tailwind CSS', 'description' => 'Master utility-first CSS framework', 'is_completed' => true],
    (object)['id' => 2, 'title' => 'Build Laravel App', 'description' => 'Create a full-stack application', 'is_completed' => false],
    (object)['id' => 3, 'title' => 'Deploy to Production', 'description' => 'Using cloud hosting services', 'is_completed' => false],
];

$task = null;
$task_id = null;

// Simple routing
if ($request_path === '' || $request_path === '/') {
    include '../resources/views/welcome.blade.php';
} elseif ($request_path === 'tasks' || $request_path === 'tasks/') {
    include '../resources/views/tasks/index.blade.php';
} elseif ($request_path === 'tasks/create' || $request_path === 'tasks/create/') {
    include '../resources/views/tasks/create.blade.php';
} elseif (preg_match('#^tasks/(\d+)$#', $request_path, $matches)) {
    $task_id = $matches[1];
    $task = isset($tasks[$task_id - 1]) ? $tasks[$task_id - 1] : null;
    if ($task) {
        include '../resources/views/tasks/show.blade.php';
    } else {
        echo "Task not found";
    }
} elseif (preg_match('#^tasks/(\d+)/edit$#', $request_path, $matches)) {
    $task_id = $matches[1];
    $task = isset($tasks[$task_id - 1]) ? $tasks[$task_id - 1] : null;
    if ($task) {
        include '../resources/views/tasks/edit.blade.php';
    } else {
        echo "Task not found";
    }
} elseif (file_exists(__DIR__ . '/' . $request_path)) {
    return false; // Let PHP serve the file
} else {
    http_response_code(404);
    echo "404 - Page not found";
}
?>