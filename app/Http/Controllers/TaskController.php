<?php

namespace App\Http\Controllers;

use App\Board;
use App\Card;
use App\Http\Requests\TaskRequest;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Task;
use Lang;

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
     * @param  \App\Repositories\Task\TaskRepositoryInterface  $taskRepository
     * @return void
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board, Card $card)
    {
        return $this->view('create', compact('board', 'card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $cards = $this->taskRepository->getCards($task->board_id);

        return $this->view('show', compact('task', 'cards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $cards = $this->taskRepository->getCards($task->board_id);

        return $this->view('edit', compact('task', 'cards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request;
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('success-message', Lang::get('tasks.successDeleteTask'));

        return redirect()->route('boards.show', ['board' => $task->board_id]);
    }
}
