<?php

namespace App\Http\Controllers;

use Lang;
use App\Team;
use App\Board;
use App\Http\Requests\BoardRequest;
use App\Repositories\Board\BoardRepositoryInterface;

class BoardController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'boards';

    /**
     * Board Repository.
     *
     * @var BoardRepositoryInterface
     */
    protected $boardRepository;

    /**
     * Create a new controller instance.
     * Only auth users can see.
     *
     * @param \App\Repositories\Board\BoardRepositoryInterface $boardRepository
     * @return void
     */
    public function __construct(BoardRepositoryInterface $boardRepository)
    {
        $this->middleware('auth');
        $this->boardRepository = $boardRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->boardRepository->get();

        return $this->view('index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::whereHas('Users', function ($query) {
            $query->where('id', auth()->id());
        })->get();

        return $this->view('create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BoardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardRequest $request)
    {
        $this->boardRepository->create(
            array_union($request->all(), ['user_id' => auth()->id()])
        );

        session()->flash('success-message', Lang::get('boards.successAddBoard'));

        return redirect()->route('boards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        $board = $this->boardRepository->getAll($board);

        return $this->view('show', compact('board'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        return $this->view('edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BoardRequest  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(BoardRequest $request, Board $board)
    {
        $board->update($request->all());

        session()->flash('success-message', Lang::get('boards.successUpdateBoard'));

        return redirect()->route('boards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $board->delete();

        session()->flash('success-message', Lang::get('boards.successDeleteBoard'));

        return redirect()->route('boards.index');
    }
}
