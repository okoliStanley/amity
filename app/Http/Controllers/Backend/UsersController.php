<?php

namespace amity\Http\Controllers\Backend;

use amity\Http\Requests\updateUserRequest;
use amity\User;

use amity\Http\Requests\storeUserRequest;
use amity\Http\Requests\DeleteUserRequest;
class UsersController extends Controller
{
        protected $users;
    public function __construct(User $users) {
        $this->users = $users;

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->paginate(10);

        return view('backend.users.index', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('backend.users.form', compact('user')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUserRequest $request)
    {
        $this->users-> create($request->only('name', 'email', 'password'));

        return redirect(route('users.index'))-> with(['status'=>'User have been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->findOrFail($id);

        return view('backend.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        $user->fill($request->only('name', 'email', 'password'))->save();
        return redirect(route('users.edit', $user->id))->with([
          'status'=>'User Have Been Updated'
        ]);   
         }


    public function confirm(DeleteUserRequest $request, $id) {
        
        $user = $this->users->findOrFail($id);
        return view('backend.users.confirm', compact('user'));
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteUserRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);

        $user->delete();

        return redirect(route('users.index'))->with(['status' => 'User have been deleted!']);
    }
}
