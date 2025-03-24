<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role','organization')->filterUser()->paginate(10);
        $users = PaginationHelper::addSerialNo($users);

        return view('typeform.users.index',compact('users'));
    }

    public function show(String $id){
        $user = User::with('role','organization')->filterUser()->find($id);

        if($user){
            return view('typeform.users.view',compact('user'));
        }else{
            return redirect()->back()->with('error','User Not Found');
        }
        
    }

    public function create(){
        $roles = Role::whereNotIn('name',['superadmin','krizmatic'])->filterRole()->get();
        $organizations = Organization::all();

        return view('typeform.users.create',compact('roles','organizations'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|min:2',
            'profile'=>'nullable|mimes:jpg,png,jpeg|max:2048',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'role_id'=>'required|integer|exists:roles,id',
            'organization_id'=>['required','integer','exists:organizations,id'],
            'branch_id'=>['nullable',Rule::requiredIf(function() use($request){
                return $request->role_id == 3;
            })],
            'form_id'=>['nullable',Rule::requiredIf(function() use($request){
                return $request->role_id == 4;
            })],
        ]);

        if($request->hasFile('profile') && $request->file('profile')->isValid()){
            $profilePic = $request->file('profile');
            $profilePicName = Str::uuid().'.'.$profilePic->getClientOriginalExtension();

            $profilePath = $profilePic->storeAs('build/profile',$profilePicName,'public');
        }

        $validatedData['avatar']=$profilePath ?? null;
        

        $role = Role::where('name','branch')->pluck('id')->first();

        if($request->role_id == $role){
            $validatedData['branch_id'] = implode(', ',$validatedData['branch_id']);
        }   

        $user = User::create($validatedData);
        
        if($user){
            return redirect()->route('user.index')->with('success','Created User Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Create User');
        }
    }

    public function edit(String $id){
        $user = User::with('role','organization')->filterUser()->find($id);
        $roles = Role::whereNotIn('name',['superadmin','krizmatic'])->filterRole()->get();
        $organizations = Organization::all();

        if($user){
            return view('typeform.users.edit',compact('user','organizations','roles'));
        }else{
            return redirect()->back()->with('error','User Not Found');
        }
    }

    public function update(Request $request,User $user){
        $validatedData = $request->validate([
            'name'=>'required|string|min:2',
            'profile'=>'nullable|mimes:jpg,png,jpeg|max:2048',
            'email'=>'required|email|unique:users,email,'.$user->id,
            // 'password'=>'nullable|min:6|confirmed',
            'role_id'=>'required|integer|exists:roles,id',
            'organization_id'=>['required','integer','exists:organizations,id'],
            'branch_id'=>['nullable',Rule::requiredIf(function() use($request){
                return $request->role_id == 3;
            })],
            'form_id'=>['nullable',Rule::requiredIf(function() use($request){
                return $request->role_id == 4;
            })],
        ]);

        if($request->hasFile('profile') && $request->file('profile')->isValid()){
            Storage::delete('public/'.$user->avatar);

            $profilePic = $request->file('profile');
            $profilePicName = Str::uuid().'.'.$profilePic->getClientOriginalExtension();

            $profilePath = $profilePic->storeAs('build/profile',$profilePicName,'public');
        }

        $validatedData['avatar'] = $profilePath ?? null;

        $role = Role::where('name','branch')->pluck('id')->first();

        if($request->role_id == $role){
            $validatedData['branch_id'] = implode(', ',$validatedData['branch_id']);
        }

        if(isset($request->password) && $request->password){
            $validatedData['password'] = $request->password;
        }

        $userUpdated = $user->update($validatedData);

        if($userUpdated){
            return redirect()->route('user.index')->with('success','Updated User Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Update User');
        }
    }

    public function destroy(Request $request){
        $validatedData = $request->validate([
            'item_id'=>'required|integer'
        ]);

        $userDelete = User::filterUser()->find($validatedData['item_id']);

        if($userDelete){
            if($userDelete->avatar && Storage::disk('public')->exists($userDelete->avatar)){
                Storage::disk('public')->delete($userDelete->avatar);
            }
            $userDelete->delete();

            return redirect()->route('user.index')->with('success','Deleted User Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete User');
        }
    }

    public function changePassword(){
        return view('typeform.users.reset-password');
    }

    public function changePasswordSubmit(Request $request){
        $validatedData = $request->validate([
            'current_password'=>['required',
                function($attribute,$value,$fail){
                    $user = Auth::user();
                    if(!Hash::check($value,$user->password)){
                        return $fail('The current password is incorrect.');
                    }
                }
            ],
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);

        User::find(auth()->user()->id)->update([
            'password'=>$validatedData['password']
        ]);

        return redirect()->route('user.index')->with('success','Password Successfully Changed');
    }

    public function assignRole(User $user){
        $userRole = auth()->user()->role->name;
        if($userRole == 'superadmin'){
            $roles = Role::all();
        }else{
            $roles = Role::whereNot('name','superadmin')->get();
        }
        
        return view('typeform.users.assignRole',compact('user','roles'));
    }

    public function assignRoleSubmit(Request $request,User $user){
        $validatedDate = $request->validate([
            'role' =>  'required|integer'
        ]);

        $roleassign = $user->update([
            'role_id'=>$validatedDate['role']
        ]);

        if($roleassign){
            return redirect()->route('user.index')->with('success','Assign Role Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Assign Role');
        }
    }
}
