<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
     // Permission
     public function showListPermission(){  
        $permissions = Permission::paginate(5);

        return view('admin.permissions.list',compact(['permissions']));
    }

    public function createPermission(){
        return view('admin.permissions.create');
    }
    public function storePermission(Request $request ){
        
        $data =$request->only('name');
        
        // DB::enableQueryLog();
        Permission::create(['name'=>implode('',$data)]);
        // dd(DB::getQueryLog());

        return redirect()->route('admin.permissions.list');
    }

    public function editPermission($id){
        $permission = Permission::findById($id);
        return view('admin.permissions.edit',compact('permission'));
    }

    public function updatePermission(Request $request ,$id){
        $permission = Permission::find($id);
        $data = $request->only('name');
        $permission->update($data);

        return redirect()->route('admin.permissions.list');
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('admin.permission.list');
    }
}
