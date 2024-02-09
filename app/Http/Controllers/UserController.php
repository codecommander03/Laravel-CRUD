<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
//use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function show(string $id): View
    {
        $user = User::find($id);
        if($user === null){
            return view('no_such_id');
        }
        return view('users.profile',['user'=>$user]);
    }

    public function index(): View
    {
        //$users = User::all();
        $paginated_user = User::paginate(5);
        //return view('users.index',['users'=>$users]);
        return view('users.index',['users' => $paginated_user]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $create = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password')
        ]);

        return redirect(route('users.index'));
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
    
        return redirect()->route('users.index');
    }

    public function edit(string $id): View
    {
        $user = User::find($id);
        // if($user === null){
        //     return view('no_such_id');
        // }
        return view('users.edit',['user'=>$user]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('users.index');
    }

//////////////////////////////////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

}
