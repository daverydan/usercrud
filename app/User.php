<?php

use DB;
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone',
    ];

    // protected $fillable = ['name', 'email'];

 //    public static $rules = array(
	//     'name' => 'required|min:5',
	// 	'email' => 'required|email'
	// );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 //    public function search(Request $request)
	// {
	    // if ($keyword!='') {
	    //     $query->where(function ($query) use ($keyword) {
	    //         $query->where("name", "LIKE","%$keyword%")
	    //             ->orWhere("email", "LIKE", "%$keyword%")
	    //             ->orWhere("username", "LIKE", "%$keyword%")
	    //             ->orWhere("phone", "LIKE", "%$keyword%");
	    //     });
	    // }

	    // if ($request->has('keyword')){

     //        $keyword = $request->get('keyword');

     //        $users = DB::table('users')
     //            where("name", "LIKE","%$keyword%"),
	    //             ->orWhere("email", "LIKE", "%$keyword%"),
	    //             ->orWhere("username", "LIKE", "%$keyword%"),
	    //             ->orWhere("phone", "LIKE", "%$keyword%"),
	    //             ->orderBy('desc'),
	    //             ->paginate(1);

     //        // return response()->json($users);
     //    }

	    // return $query;
	// }
}
