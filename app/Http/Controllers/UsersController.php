<?php

namespace App\Http\Controllers;

use DB;
use App\User; // davery
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = DB::table('users')->paginate(1);
    	return view('users.index', ['users' => $users]);
        // $users = User::all();
        // return view('users.index', compact('users'));
        // return View::make('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        // $input = $request->all();
        $user = new User([
        	'name' => $request->get('name'),
        	'email' => $request->get('email'),
        	'phone' => $request->get('phone'),
        	'username' => $request->get('username'),
        	'password' => bcrypt($request->get('password'))
    	]);

        // dd($user);
        $user->save();
        return redirect('users')->with('message', 'User added successfully');
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
        $user = User::whereId($id)->firstOrFail();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddUserRequest $request, $id)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        if ($request->get('password') != null) {
	        $user->password = bcrypt($request->get('password'));
        } else {

        }
        // dd($user);
        $user->save();
        return redirect('users')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::whereId($id)->firstOrFail();
	    $user->delete();
	    return redirect('users')->with('message', 'User successfully deleted');
    }
}
