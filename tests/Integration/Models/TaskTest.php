<?php

namespace Tests\Integration;


use App\Task;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * User object.
     *
     * @var string
     */
    protected $user;

    /**
     * Shows in every test in this class.
     *
     * Test:
     * Is user authenticated.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->be($this->user);

        $this->assertAuthenticatedAs($this->user);
    }

    /**
     * Test:
     * Get tasks for auth user.
     * Tasks are sorted by status.
     *
     * @return void
     */
    public function testGetTasksForUserAndIfItIsSorted()
    {
        $generatedTasks = factory(Task::class, 3)->create(['user_id' => $this->user->id]);

        $tasks = Task::get();

        $this->assertCount(3, $tasks);

        $sorted = $generatedTasks->sortBy('status')->pluck('id');

        $this->assertEquals($sorted, $tasks->pluck('id'));
    }
}
