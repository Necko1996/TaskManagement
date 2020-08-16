<?php

namespace Tests\Integration;

use App\Board;
use App\Card;
use App\Task;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
//        factory(Board::class, 3)->create(['user_id' => $this->user->id]);
//
//        $boards = Board::get();
//
//        $this->assertCount(3, $boards);
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
//        $board = factory(Board::class)->create(['user_id' => $this->user->id]);
//        factory(Card::class, 3)->create(['board_id' => $board->id]);
//
//        $cards = Board::getCards($board->id);
//
//        $this->assertCount(3, $cards);
//
//        $sortedCards = $cards->sortBy('status')->pluck('id');
//
//        $this->assertEquals($sortedCards, $cards->pluck('id'));
    }

    /**
     * Test:
     * Get tasks for card.
     *
     * @return void
     */
    public function testACardCanHaveManyTasks()
    {
//        $board = factory(Board::class)->create(['user_id' => $this->user->id]);
//        $card = factory(Card::class)->create(['board_id' => $board->id]);
//        factory(Task::class, 3)->create(['card_id' => $card->id, 'board_id' => $board->id]);
//
//        $getTasks = Board::getTask($board->id, $card->id);
//
//        $this->assertCount(3, $getTasks);
    }

    /**
     * Test:
     * Get all records for board.
     *
     * @return void
     */
    public function testGetAllRecordsForBoard()
    {
//        $board = factory(Board::class)->create(['user_id' => $this->user->id]);
//
//        Board::createBase($board);
//
//        $cards = Board::getCards($board->id);
//
//        foreach ($cards as $card) {
//            factory(Task::class, 5)->create(['card_id' => $card->id, 'board_id' => $board->id]);
//        }
//
//        $getAll = Board::getAll($board);
//
//        $getCard = $getAll->cards;
//
//        $this->assertCount(3, $getCard);
//
//        for ($i = 0; $i < count($getCard); $i++) {
//            $getTasks = $getAll->cards[$i]->tasks;
//
//            $this->assertCount(5, $getTasks);
//        }
    }

    /**
     * Test:
     * Create basic cards.
     *
     * @return void
     */
    public function testCreateBaseRecords()
    {
//        $board = factory(Board::class)->create(['user_id' => $this->user->id]);
//
//        Board::createBase($board);
//
//        $getCards = Board::getCards($board->id);
//
//        $this->assertCount(3, $getCards);
    }
}
