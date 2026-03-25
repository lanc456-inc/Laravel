<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_tasks_index_shows_tasks()
    {
        Task::create(['title' => 'Test task', 'description' => 'Sample', 'is_completed' => false]);

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Test task');
    }

    public function test_can_create_task_and_redirects_to_index()
    {
        $response = $this->post(route('tasks.store'), [
            'title' => 'New Task',
            'description' => 'Create it',
            'is_completed' => '1',
        ]);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', ['title' => 'New Task', 'is_completed' => true]);
    }

    public function test_can_update_task()
    {
        $task = Task::create(['title' => 'Old Task', 'description' => 'Desc', 'is_completed' => false]);

        $response = $this->put(route('tasks.update', $task), [
            'title' => 'Updated Task',
            'description' => 'New desc',
            'is_completed' => '1',
        ]);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'title' => 'Updated Task', 'is_completed' => true]);
    }

    public function test_can_delete_task()
    {
        $task = Task::create(['title' => 'Task to delete', 'description' => 'Need removal', 'is_completed' => false]);

        $response = $this->delete(route('tasks.destroy', $task));

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_title_is_required_when_creating_task()
    {
        $response = $this->post(route('tasks.store'), [
            'title' => '',
            'description' => 'Foo',
            'is_completed' => '0',
        ]);

        $response->assertSessionHasErrors('title');
    }
}
