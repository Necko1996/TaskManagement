<?php

namespace App\Http\Controllers;

use App\Board;
use App\Card;
use App\Http\Requests\CardRequest;
use Lang;

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
     * @param  \App\Http\Requests\CardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request, Board $board)
    {
        Card::create(
            array_union($request->all(), ['board_id' => $board->id])
        );

        session()->flash('success-message', Lang::get('cards.successAddTask'));

        return redirect()->route('boards.show', ['board' => $board->id]);
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
     * @param  \App\Http\Requests\CardRequest  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
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
