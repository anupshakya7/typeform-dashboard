<?php

namespace App\Http\Controllers\Typeform;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    public function index(){
        $branches = Branch::with('organization')->filterBranch()->paginate(10);
        $branches = PaginationHelper::addSerialNo($branches);

        return view('typeform.branch.index',compact('branches'));
    }

    public function show(String $id){
        $branch = Branch::filterBranch()->find($id);
        
        if($branch){
            return view('typeform.branch.view',compact('branch'));
        }else{
            return redirect()->back()->with('error','Branch Not Found');
        }
    }

    public function create(){
        $organizations = Organization::filterOrganization()->get();
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);

        return view('typeform.branch.create',compact('organizations','countries'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'organization_id'=>'required|integer|exists:organizations,id',
            'name'=>'required|string|min:2'
        ]);

        $branch = Branch::create($validatedData);

        if($branch){
            return redirect()->route('branch.index')->with('success','Created Branch Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Create Branch');
        }
    }

    public function edit(String $id){
        $branch = Branch::filterBranch()->find($id);
        $organizations = Organization::filterOrganization()->get();
        $countriesPath = public_path('build/js/countries/countries.json');
        $countries = json_decode(File::get($countriesPath),true);

        if($branch){
            return view('typeform.branch.edit',compact('branch','organizations','countries'));
        }else{
            return redirect()->back()->with('error','Branch Not Found');
        }
    }

    public function update(Request $request,Branch $branch){
        $validatedData = $request->validate([
            'organization_id'=>'required|integer|exists:organizations,id',
            'name'=>'required|string|min:2'
        ]);

        $branchUpdated = $branch->update($validatedData);

        if($branchUpdated){
            return redirect()->route('branch.index')->with('success','Updated Branch Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Update Branch');
        }
    }

    public function destroy(Request $request){
        $validatedData = $request->validate([
            'item_id'=>'required|integer'
        ]);

        $branchDelete = Branch::filterBranch()->find($validatedData['item_id']);

        if($branchDelete){
            $branchDelete->delete();

            return redirect()->route('branch.index')->with('success','Deleted Branch Successfully!!!');
        }else{
            return redirect()->back()->with('error','Failed to Delete Branch');
        }
    }

    public function generateCSV(){
        $branches = Branch::with('organization')->filterBranch()->get();
        $filename = "branch.csv";
        $fp = fopen($filename,'w+');
        fputcsv($fp,array('ID','Organization','Name','Created At'));

        foreach($branches as $row){
            fputcsv($fp,array(
                $row->id,
                optional($row->organization)->name,
                $row->name,
                $row->created_at
            ));
        }

        fclose($fp);
        $headers = array('Content-Type' => 'text/csv');

        return response()->download($filename,'branch.csv',$headers);

    }
}
