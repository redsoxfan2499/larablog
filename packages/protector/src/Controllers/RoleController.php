<?php

namespace HyperdriveDesigns\Protector\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use DB;

use Protector;
use HyperdriveDesigns\Protector\Models\Role;
use HyperdriveDesigns\Protector\Models\User;
use HyperdriveDesigns\Protector\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('protector/role/index', compact('roles'));
    }

    public function newRole(Request $request)
    {
        $role = new Role(array(
            'name'   	      => $request->get('role_name'),
            'slug'   	    => $request->get('role_slug')
        ));
        $role->name = strtolower($role->name);
        $role->name = str_replace(' ', '_', $role->name);
        $role->save();

        return redirect()->back();
    }

    // public function addPermission($id)
    // {
    //   if (Auth::check())
    //   {
    //     $role = Role::findOrFail($id);
    //     $user_id = Auth::user()->id;
    //     // need  to do a JOIN statement with role_user and roles
    //     $role_id = DB::table('role_user')->where('user_id', $user_id)->value('role_id');
    //     $role_name = DB::table('roles')->where('id', $role_id)->value('name');
    //
    //     //$role_id_permissions = DB::table('permission_role')->where('role_id', $id)->value('role_id');
    //     // $role_id_permissions = DB::table('permission_role')
    //     //              ->select(DB::raw('permission_id, '))
    //     //              ->where('role_id', '=', $id)
    //     //              ->get();
    //      $permissions = DB::table('permission_role')
    //        ->where('role_id', '=', $id)
    //        ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
    //        ->join('roles', 'permission_role.role_id', '=', 'roles.id')
    //        ->select('permission_role.*', 'permissions.id', 'permissions.name', 'permissions.label', 'roles.name')
    //        ->get();
    //     //dd($permissions);
    //     return view('admin/roles/add', compact('role_name', 'permissions'));
    //   }
    // }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('protector.role.edit', compact('role'));
    }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->get('role_name');
        $role->slug = $request->get('role_label');
        // format permission name before saving
        $role->name = strtolower($role->name);
        $role->name = str_replace(' ', '_', $role->name);
        $role->save();
        return redirect('protector/role');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('protector/role');
    }

    /**
     * A full matrix of roles and permissions.
     * @return Response
     */
    public function showRoleMatrix()
    {
        $roles = Role::all();
        $perms = Permission::all();
        $prs = DB::table('permission_role')->select('role_id as r_id','permission_id as p_id')->get();

        $pivot = [];
        foreach($prs as $p)
        {
            $pivot[] = $p->r_id.":".$p->p_id;
        }
        return view('protector.role.matrix', compact('roles','perms','pivot') );
    }

    /**
     * Sync roles and permissions.
     * @return Response
     */
    public function updateRoleMatrix(Request $request)
    {
        $bits = $request->get('perm_role');
        foreach($bits as $v)
        {
            $p = explode(":", $v);
            $data[] = array('role_id' => $p[0], 'permission_id' => $p[1]);
        }

        DB::transaction(function () use ($data) {
            DB::table('permission_role')->delete();
            DB::statement('ALTER TABLE permission_role AUTO_INCREMENT = 1');
            DB::table('permission_role')->insert($data);
        });

        return redirect()->back();
    }

}
