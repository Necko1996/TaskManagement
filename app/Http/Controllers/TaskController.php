<?php

namespace App\Http\Controllers;

use Lang;
use App\Card;
use App\Task;
use App\Board;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'tasks';

    /**
     * Create a new controller instance.
     * Only auth users can see.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(TaskRequest $request)
    {
        Task::create($request->all());

        session()->flash('success-message', Lang::get('tasks.successAddTask'));

        return redirect()->route('boards.show', ['board' => $request->board_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $cards = Board::forAuthUser()->find($task->board_id)->cards;

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
        $cards = Board::forAuthUser()->find($task->board_id)->cards;

        return $this->view('edit', compact('task', 'cards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest $request;
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
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('success-message', Lang::get('tasks.successDeleteTask'));

        return redirect()->route('boards.show', ['board' => $task->board_id]);
    }
}
