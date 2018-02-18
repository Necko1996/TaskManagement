<?php

namespace App\Http\Controllers;

use Lang;
use App\Card;
use App\Board;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'cards';

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
    public function create(Board $board)
    {
        return $this->view('create', compact('board'));
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
                'name' => 'required|min:5',
                'status' => 'required|integer',
                'board_id' => 'required|integer',
            ]);

        Card::create($request->all());

        session()->flash('success-message', Lang::get('cards.successAddTask'));

        return redirect()->route('boards.show', ['board' => $request->board_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return $this->view('edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $this->validate($request,
            [
                'name' => 'required|min:2',
                'status' => 'required|integer',
            ]
        );

        $card->update($request->all());

        session()->flash('success-message', Lang::get('cards.successUpdateTask'));

        return redirect()->route('boards.show', ['board' => $card->board_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('boards.show', ['board' => $card->board_id]);
    }
}
