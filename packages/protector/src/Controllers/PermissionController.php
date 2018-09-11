<?php

namespace HyperdriveDesigns\Protector\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use DB;

use Protector;
use HyperdriveDesigns\Protector\Models\Role;
use HyperdriveDesigns\Protector\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('protector.permission.index', compact('permissions'));
    }

    public function newPermission(Request $request)
    {
        $permission = new Permission(array(
            'name'      => $request->get('permission_name'),
            'slug'   	=> $request->get('permission_slug')
        ));
        $permission->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('protector.permission.edit', compact('permission'));
    }

    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->get('permission_name');
        $permission->slug = $request->get('permission_slug');
        $permission->save();

        return redirect('protector/permission');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect('protector/permission');
    }
}
