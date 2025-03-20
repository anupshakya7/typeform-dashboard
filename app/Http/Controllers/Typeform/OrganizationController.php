<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\DownloadCSV;
use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function index(){
        $organizations = Organization::paginate(10);
        $organizations = PaginationHelper::addSerialNo($organizations);

        return view('typeform.organization.index',compact('organizations'));
    }

    public function show(Organization $organization){
        return view('typeform.organization.view',compact('organization'));
    }

    public function create(){
        // $countriesPath = public_path('build/js/countries/countries.json');
        // $countries = json_decode(File::get($countriesPath),true);


        return view('typeform.organization.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|min:2',
            'logo'=>'nullable|mimes:png,jpg,jpeg|max:2048',
            // 'country'=>'required|string'
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
        // $countriesPath = public_path('build/js/countries/countries.json');
        // $countries = json_decode(File::get($countriesPath),true);

        return view('typeform.organization.edit',compact('organization'));
    }

    public function update(Request $request,Organization $organization){
        $validatedData = $request->validate([
            'name'=>'required|string|min:2',
            'logo'=>'nullable|mimes:png,jpg,jpeg|max:2048',
            // 'country'=>'required|string'
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
            'item_id'=>'required|integer'
        ]);

        $organizationDelete = Organization::find($validatedData['item_id']);

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

    public function generateCSV(){
        $organizations = Organization::all();
        $filename = "organization.csv";
    

        return DownloadCSV::downloadCSV($organizations,$filename);

    }
}
