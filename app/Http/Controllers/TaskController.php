<?php

namespace App\Http\Controllers;

use Lang;
use App\Card;
use App\Task;
use App\Board;
use Illuminate\Http\Request;

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
        $tasks = Task::get();

        return $this->view('index', compact('tasks'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|min:5',
                'description' => 'required|min:10',
                'priority' => 'required|integer',
                'board_id' => 'required|integer',
                'card_id' => 'required|integer',
            ]);

        Task::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'board_id' => $request->board_id,
                'card_id' => $request->card_id,
                'user_id' => auth()->id(),
            ]
        );

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
        $cards = Board::getCards($task->board_id);

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
        $cards = Board::getCards($task->board_id);

        return $this->view('edit', compact('task', 'cards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request,
            [
                'title' => 'required|min:5',
                'description' => 'required|min:10',
                'priority' => 'required|integer',
                'card_id' => 'required|integer',
            ]
        );

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
