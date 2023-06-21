<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('deleted_at','=',null)
            ->orderBy('created_at','DESC')
            ->paginate(5);;
        return Inertia::render('UsersList',['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->PLS = $request->PLS;
        $user->USDT = $request->USDT;
        $user->BRAIN = $request->BRAIN;
        $user->save();
        return Redirect::back()
            ->with('message','User Updated Successfully')
            ->with('type', 'emerald')
            ->with('key', Str::uuid()->toString());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::back()
            ->with('message','User Deleted Successfully')
            ->with('type', 'red')
            ->with('key', Str::uuid()->toString());
    }
}
