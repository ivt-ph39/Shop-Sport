<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\Eloquent\userRepository;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $user)
    {
        $this->userRepo = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(5);

        return view('admin.users.list', compact('users'));
    }

    public function indexSearch()
    {

        return view('admin.full_text_search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepo->all();
        return view('admin.users.create', compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $this->userRepo->create($data);

        // $this->userRepo->create($data);
        return redirect()->route('admin.users.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $data = 'Name: ' . $user->name
            . '<br/>Email: ' . $user->email
            . '<br/>User ID: ' . $user->id;

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepo->find($id);
        // DB::enableQueryLog();
        $data = $request->all();
        $user->update($data);
        // dd(DB::getQueryLog());
        return redirect()->route('admin.users.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepo->find($id);
        $user->delete();
        return redirect()->route('admin.users.list');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $data = User::search($request->get('full_text_search_query'))->get();

            return response()->json($data);
        }
    }

    public function searchByName(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($users);
    }

    public function searchByEmail(Request $request)
    {
        $users = User::where('email', 'like', '%' . $request->value . '%')->get();

        return response()->json($users);
    }
}
