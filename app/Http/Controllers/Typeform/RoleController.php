<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        $roles = PaginationHelper::addSerialNo($roles);
        return view('typeform.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typeform.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|string'
        ]);

        $role = Role::create($validatedData);

        if($role){
            return redirect()->route('role.index')->with('success','Created Role Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Create Role');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('typeform.roles.view',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('typeform.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name'=>'required|string'
        ]);

        $roleUpdated = $role->update($validatedData);

        if($roleUpdated){
            return redirect()->route('role.index')->with('success','Updated Role Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Update Role');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'item_id'=>'required|integer'
        ]);

        $roleDelete = Role::find($validatedData['item_id']);

        if($roleDelete){

            $roleDelete->delete();

            return redirect()->route('role.index')->with('success','Deleted Role Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete Role');
        }
    }

    public function assignPermission(Role $role){
        $role->load('permissions');
        $permissions = Permission::all();
        return view('typeform.roles.assignPermission',compact('role','permissions'));
    }

    public function assignPermissionSubmit(Request $request,Role $role){
        $validatedData = $request->validate([
            'permission' =>  'required|array'
        ]);

        $assignPermission = $role->permissions()->sync($validatedData['permission']);

        if($assignPermission){
            return redirect()->route('role.index')->with('success','Assign Permission Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Assign Permission');
        }
    }
}
