<?php

namespace HyperdriveDesigns\Protector\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use DB;
use View;
use Config;
use Protector;
use App\User;
use HyperdriveDesigns\Protector\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('protector.user.index', compact('users'));
    }

    public function newUser(Request $request)
    {
        $user = new User(array(
            'name'   	      => $request->get('user_name'),
            'email'   	    => $request->get('user_email'),
            'password'      => bcrypt($request->get('user_password'))
        ));

        $user->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('protector.user.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('user_name');
        $user->email = $request->get('user_email');

        $user->save();

        return redirect('protector/user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('protector/user');
    }

    public function showUserMatrix()
    {

        $roles = Role::all();
        $users = User::all();
        $us = DB::table('role_user')->select('role_id as r_id','user_id as u_id')->get();
        $pivot = [];
        foreach($us as $u)
        {
            $pivot[] = $u->r_id.":".$u->u_id;
        }

        return view('protector.user.matrix', compact('roles','users','pivot') );

    }

    public function updateUserMatrix(Request $request)
    {
        $bits = $request->get('role_user');
        foreach($bits as $v)
        {
            $p = explode(":", $v);
            $data[] = array('role_id' => $p[0], 'user_id' => $p[1]);
        }

        DB::transaction(function () use ($data) {
            DB::table('role_user')->delete();
            DB::statement('ALTER TABLE role_user AUTO_INCREMENT = 1');
            DB::table('role_user')->insert($data);
        });
        return redirect()->back();
    }
}
