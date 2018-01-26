<?php

namespace Tests\Feature;

use App\Task;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
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
     * Get logged user.
     *
     * @return void
     */
    public function testGetAuthUserFromDB()
    {
        $logged = User::loggedUser();

        $this->assertEquals($this->user->id, $logged->id);
    }

    /**
     * Test:
     * Get tasks for user.
     * Tasks are sorted by status.
     *
     * @return void
     */
    public function testGetTasksForUserAndIfItIsSorted()
    {
        $generatedTasks = factory(Task::class, 3)->create(['user_id' => $this->user->id]);

        $tasks = User::loggedUser()->tasks;

        $this->assertCount(3, $tasks);

        $this->assertEquals($generatedTasks->sortBy('status')->pluck('id'), $tasks->pluck('id'));
    }
}
