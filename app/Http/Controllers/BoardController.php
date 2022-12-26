<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\Board\StoreBoardRequest;
use App\Http\Requests\Board\UpdateBoardRequest;
use App\Repositories\Board\BoardRepositoryInterface;
use App\Repositories\Team\TeamRepositoryInterface;
use Illuminate\Support\Facades\Lang;

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
     * Board Repository.
     *
     * @var TeamRepositoryInterface
     */
    protected $teamRepository;

    /**
     * Create a new controller instance.
     * Only auth users can see.
     *
     * @param BoardRepositoryInterface $boardRepository
     * @param TeamRepositoryInterface $teamRepository
     */
    public function __construct(BoardRepositoryInterface $boardRepository, TeamRepositoryInterface $teamRepository)
    {
        $this->middleware('auth');
        $this->boardRepository = $boardRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $teams = $this->boardRepository->get();

        return $this->view('index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $teams = $this->teamRepository->get();

        return $this->view('create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBoardRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBoardRequest $request)
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
     * @param Board $board
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Board $board)
    {
        $board = $this->boardRepository->getAll($board);

        return $this->view('show', compact('board'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Board $board
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Board $board)
    {
        return $this->view('edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBoardRequest $request
     * @param Board $board
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBoardRequest $request, Board $board)
    {
        $board->update([
            'name' => $request->name,
        ]);

        session()->flash('success-message', Lang::get('boards.successUpdateBoard'));

        return redirect()->route('boards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Board $board
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Board $board)
    {
        $board->delete();

        session()->flash('success-message', Lang::get('boards.successDeleteBoard'));

        return redirect()->route('boards.index');
    }
}
