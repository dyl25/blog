<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = \App\User::paginate(10);

        \Carbon\Carbon::setLocale('fr');
        //dd($users);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = \App\Role::all()->pluck('name', 'id');

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'role_id' => 'bail|required|integer|min:1',
            'name' => 'bail|unique:users,name|required|max:50',
            'email' => 'bail|required|email|unique:users,email|max:191',
            'password' => 'bail|required|min:6'
        ]);
        // dd($request);
        \App\User::create([
            'role_id' => $request['role_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        return redirect('/backoffice/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = \App\User::find($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $roles = \App\Role::all()->pluck('name', 'id');
        $user = \App\User::find($id);
//dd($user);
        return view('admin.user.edit', compact('roles', 'user'));
    }

    /**
     * Show the form for editing the password of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword($id) {

        return view('admin.user.editPassword', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'role_id' => 'bail|required|integer|min:1',
            'name' => 'bail|unique:users,name,' . $id . '|required|max:50',
            'email' => 'bail|required|email|unique:users,email,' . $id . '|max:191',
        ]);
        \App\User::find($id)
                ->update([
                    'role_id' => $request['role_id'],
                    'name' => $request['name'],
                    'email' => $request['email'],
        ]);

        session()->flash('notification', "L'utilisateur a bien été modifié !");

        return redirect('/backoffice/users');
    }

    /**
     * Update the password of the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id) {
        $this->validate($request, [
            'password' => 'bail|required|min:6'
        ]);
        \App\User::find($id)
                ->update([
                    'password' => bcrypt($request['password'])
        ]);

        session()->flash('notification', "Le mot de passe de l'utilisateur à bien été modifié !");

        return redirect('/backoffice/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = \App\User::find($id);
        
        $user->delete();
        
        session()->flash('notification', "L'utilisateur a bien été supprimé !");
        
        return redirect('backoffice/users');
    }

}
