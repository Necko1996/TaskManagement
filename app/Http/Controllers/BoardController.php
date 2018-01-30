<?php

namespace App\Http\Controllers;

use Lang;
use App\Card;
use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'boards';

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
        $boards = Board::get();

        return $this->view('index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('create');
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
                'name' => 'required|min:3',
            ]);

        $board = Board::create(
            [
                'name' => $request->name,
                'user_id' => auth()->id(),
            ]
        );

        Board::createBase($board);

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
        $cards = Board::getCards($board->id);
        return $this->view('show', compact('board', 'cards'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3',
            ]
        );

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
