<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Card;
use App\Http\Requests\Task\TaskRequest;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Lang;

class TaskController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'tasks';

    /**
     * Board Repository.
     *
     * @var TaskRepositoryInterface
     */
    protected $taskRepository;

    /**
     * Create a new controller instance.
     * Only auth users can see.
     *
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Board $board
     * @param Card $card
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Board $board, Card $card)
    {
        return $this->view('create', compact('board', 'card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $request
     * @param Board $board
     * @param Card $card
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request, Board $board, Card $card)
    {
        Task::create(
            array_union($request->all(), [
                'board_id' => $board->id,
                'card_id' => $card->id,
            ])
        );

        session()->flash('success-message', Lang::get('tasks.successAddTask'));

        return redirect()->route('boards.show', ['board' => $board->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Task $task)
    {
        $cards = $this->taskRepository->getCards($task->board_id);

        return $this->view('show', compact('task', 'cards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        $cards = $this->taskRepository->getCards($task->board_id);

        return $this->view('edit', compact('task', 'cards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());

        session()->flash('success-message', Lang::get('tasks.successUpdateTask'));

        return redirect()->route('boards.show', ['board' => $task->board_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('success-message', Lang::get('tasks.successDeleteTask'));

        return redirect()->route('boards.show', ['board' => $task->board_id]);
    }
}
