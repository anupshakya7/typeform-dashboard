<?php

namespace App\Http\Controllers\Typeform;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function index(){
        $organizations = Organization::all();

        return view('typeform.organization.index',compact('organizations'));
    }

    public function show(){
        return view('typeform.organization.view');
    }

    public function create(){
        return view('typeform.organization.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|min:2',
            'logo'=>'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $logoPic = $request->file('logo');
            $logoPicName = Str::uuid().'.'.$logoPic->getClientOriginalExtension();

            //Store the file in Logo Directory
            $logoPath = $logoPic->storeAs('build/logo',$logoPicName,'public');
        }

        $validatedData['logo'] = $logoPath ?? null;

        $organization = Organization::create($validatedData);

        if($organization){
            return redirect()->route('organization.index')->with('success','Created Organization Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Create Organization');
        }
    }

    public function edit(Organization $organization){
        return view('typeform.organization.edit',compact('organization'));
    }

    public function update(Request $request,Organization $organization){
        $validatedData = $request->validate([
            'name'=>'required|string|min:2',
            'logo'=>'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            Storage::delete('public/'.$organization->logo);

            $logoPic = $request->file('logo');
            $logoPicName = Str::uuid().'.'.$logoPic->getClientOriginalExtension();

            //Store the file in Logo Directory
            $logoPath = $logoPic->storeAs('build/logo',$logoPicName,'public');
        }

        $validatedData['logo'] = $logoPath ?? null;

        $organizationUpdated = $organization->update($validatedData);

        if($organizationUpdated){
            return redirect()->route('organization.index')->with('success','Updated Organization Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Update Organization');
        }
    }

    public function destroy(Request $request){
        $validatedData = $request->validate([
            'organization_id'=>'required|integer'
        ]);

        $organizationDelete = Organization::find($validatedData['organization_id']);

        if($organizationDelete){
            if($organizationDelete->logo && Storage::disk('public')->exists($organizationDelete->logo)){
                Storage::disk('public')->delete($organizationDelete->logo);
            }

            $organizationDelete->delete();

            return redirect()->route('organization.index')->with('success','Deleted Organization Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete Organization');
        }
    }
}
