<?php

namespace App\Http\Controllers;

use App\Events\AssignUserToTeamEvent;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UserTeamRequest;
use App\Models\Team;
use App\Models\User;
use App\Repositories\Team\TeamRepositoryInterface;
use Illuminate\Support\Facades\Lang;

class TeamController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'teams';

    /**
     * Team Repository.
     *
     * @var TeamRepositoryInterface
     */
    protected $teamRepository;

    /**
     * Create a new controller instance.
     * Only auth users can see.
     *
     * @return void
     */
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->middleware('auth');
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $teams = $this->teamRepository->get();

        return $this->view('index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return $this->view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTeamRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->all());

        event(new AssignUserToTeamEvent($team));

        session()->flash('success-message', Lang::get('teams.successAddTeam'));

        return redirect()->route('teams.index');
    }

    /**
     * Show the form for adding a new User to Team.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addUser()
    {
        $teams = $this->teamRepository->get();

        return $this->view('addUser', compact('teams'));
    }

    /**
     * Store a new member of Team.
     *
     * @param  UserTeamRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUser(UserTeamRequest $request)
    {
        $team = Team::find($request->team_id);
        $user = User::where('email', '=', $request->email);

        if (! $user->exists()) {
            session()->flash('error-message', Lang::get('teams.errorNoUser'));

            return redirect()->route('teams.index');
        }

        $team->users()->attach($user->get());

        session()->flash('success-message', Lang::get('teams.successAddUser'));

        return redirect()->route('teams.index');
    }
}
