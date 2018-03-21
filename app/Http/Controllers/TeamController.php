<?php

namespace App\Http\Controllers;

use Lang;
use App\Team;
use App\User;
use App\Http\Requests\TeamRequest;
use App\Events\AssignUserToTeamEvent;
use App\Http\Requests\TeamUserRequest;

class TeamController extends Controller
{
    /**
     * Directory of views.
     *
     * @var string
     */
    protected $viewDir = 'teams';

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
        $teams = Team::whereHas('Users', function ($query) {
            $query->where('id', auth()->id());
        })->get();

        return $this->view('index', compact('teams'));
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
     * @param  \App\Http\Requests\TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = Team::create($request->all());

        event(new AssignUserToTeamEvent($team));

        session()->flash('success-message', Lang::get('teams.successAddTeam'));

        return redirect()->route('teams.index');
    }

    /**
     * Show the form for adding a new User to Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function addUser()
    {
        $teams = Team::whereHas('Users', function ($query) {
            $query->where('id', auth()->id());
        })->get();

        return $this->view('addUser', compact('teams'));
    }

    /**
     * Store a new member of Team.
     *
     * @param  \App\Http\Requests\TeamUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(TeamUserRequest $request)
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
