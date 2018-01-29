<?php

namespace Tests\Integration;

use App\Card;
use App\Task;
use App\User;
use App\Board;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BoardTest extends TestCase
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
     * Get boards for user.
     *
     * @return void
     */
    public function testAUserCanHaveManyBoards()
    {
        factory(Board::class, 3)->create(['user_id' => $this->user->id]);

        $boards = Board::get();

        $this->assertCount(3, $boards);
    }

    /**
     * Test:
     * Get cards for auth user and board.
     * Cards are sorted by status.
     *
     * @return void
     */
    public function testBoardHaveManyCards()
    {
        $board = factory(Board::class)->create(['user_id' => $this->user->id]);
        factory(Card::class, 3)->create(['board_id' => $board->id]);

        $cards = Board::getCards($board->id);

        $this->assertCount(3, $cards);

        $sortedCards = $cards->sortBy('status')->pluck('id');

        $this->assertEquals($sortedCards, $cards->pluck('id'));
    }

    /**
     * Test:
     * Get tasks for card.
     *
     * @return void
     */
    public function testACardCanHaveManyTasks()
    {
        $board = factory(Board::class)->create(['user_id' => $this->user->id]);
        $cards = factory(Card::class)->create(['board_id' => $board->id]);
        factory(Task::class, 3)->create(['card_id' => $cards->id, 'board_id' => $board->id]);

        $getTasks = Board::getTask($board->id, $cards->id);

        $this->assertCount(3, $getTasks);
    }
}