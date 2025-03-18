<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::with('routes')->paginate(10);
        $permissions = PaginationHelper::addSerialNo($permissions);
        return view('typeform.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typeform.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'name'=>'required|string'
       ]);

        $permission = Permission::create($validatedData);

        if($permission){
            return redirect()->route('permission.index')->with('success','Created Permission Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Create Permission');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('typeform.permission.view',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('typeform.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validatedData = $request->validate([
            'name'=>'required|string'
        ]);

        $permissionUpdated = $permission->update($validatedData);

        if($permissionUpdated){
            return redirect()->route('permission.index')->with('success','Updated Permission Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Update Permission');
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

        $permissionDelete = Permission::find($validatedData['item_id']);

        if($permissionDelete){

            $permissionDelete->delete();

            return redirect()->route('permission.index')->with('success','Deleted Permission Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete Permission');
        }
    }

    public function assignRoute(Permission $permission){
        $permission->load('routes');
        $routes = Route::getRoutes();
        $middlewareGroup = 'check_auth';

        $routeDetails = [];

        foreach($routes as $route){
            $middlewares = $route->gatherMiddleware();
            if(in_array($middlewareGroup,$middlewares)){
                $routeName = $route->getName();
                if($routeName !== 'home.index'){
                    $routeDetails[] = [
                        'name'=>$route->getName(),
                        'uri'=>$route->uri()
                    ];
                }
            }
        }

        return view('typeform.permission.assignRoute',compact('permission','routeDetails'));
    }

    public function assignRouteSubmit(Request $request,Permission $permission){
        $validatedData = $request->validate([
            'route' =>  'required|array'
        ]);

        PermissionRoute::where('permission_id',$permission->id)->delete();

        foreach($validatedData['route'] as $route){
            PermissionRoute::create([
                'permission_id'=>$permission->id,
                'route'=>$route,
            ]);
        }

        return redirect()->route('permission.index')->with('success','Assign Route Successfully!!!');
    }
}
