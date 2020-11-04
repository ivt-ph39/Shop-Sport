<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Roles 
    /*
    $user->givePermissionTo($permission) : assign permiss to user
    */ 
    public function showListRole(){
        $roles=  Role::paginate(5);

        return view('admin.roles.list',compact(['roles']));
    }

    public function createRole(){
        
        return view('admin.roles.create');
    }

    public function storeRole(Request $request){
        $data =$request->only('name');
        
        // DB::enableQueryLog();
        Role::create(['name'=>implode('',$data)]);
        // dd(DB::getQueryLog());
        return redirect()->route('admin.roles.list');
    }

    public function editRole($id){
        $role = Role::findById($id);
        return view('admin.roles.edit',compact('role'));
    }

    public function updateRole(Request $request ,$id){
        $role = Role::find($id);
        $data = $request->only('name');
        $role->update($data);

        return redirect()->route('admin.roles.list');
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.roles.list');
    }

    public function showAssign($id){
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::all();

        return view('admin.roles.assignPermission',compact('role','permissions'));
    }

    public function assignPermission(Request $request,$id){
       
        $role = Role::with('permissions')->find($id);
        $arrayPermission = $role->getPermissionNames()->toArray();
        foreach ($request->only('permissions') as $p) {
            $x= array_merge($arrayPermission,$p);
        }
        $role->syncPermissions($x);
        
        return redirect()->route('admin.roles.list');
    }

    public function showRevoke($id){
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::all();

        return view('admin.roles.revokePermission',compact('role','permissions'));
    }

    public function revokePermission(Request $request,$id){
        $role = Role::with('permissions')->find($id);
        foreach ($request->only('permissions') as $permission) {
             $x=$role->revokePermissionTo($permission);
        }
        
        return redirect()->route('admin.roles.list');
    }

    public function test(){
       
    }
}

