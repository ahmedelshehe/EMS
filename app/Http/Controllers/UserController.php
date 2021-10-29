<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $users = DB::table('users')->get();
        if ($request->has('searched')) {
            $users = User::where('username', 'like', "%{$request->searched}%")->orWhere('email', 'like', "%{$request->searched}%")->get();
        }
        return view('users.index', ['users' => $users]);
    }

    /**
     * Change User Password.
     *
     * @return \Illuminate\Http\Request
     */
    public function change_password(Request $request, $id)
    {
        $user=User::find($id);
        $request->validate([
          'password' => ['required', 'string', 'confirmed'],
      ]);

        $user->update([
          'password' => Hash::make($request->password)
      ]);

        return redirect()->route('users.index')->with('message', 'User Password Updated Succesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('users.index')->with('message','User Created Succesfully');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        
        $user->update([
            'username' => $request['username'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
        ]);


         return redirect()->route('users.index')->with('message','User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(auth()->user()==$user){
            return redirect()->route('users.index')->with('message','Cant Delete Yourself !!');
            
            }else{
            $user->delete();
            return redirect()->route('users.index')->with('message','User Deleted Succesfully');
        }
        
    }
}
