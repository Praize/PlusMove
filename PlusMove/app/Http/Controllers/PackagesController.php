<?php

namespace App\Http\Controllers;

use App\Models\packages;
use Illuminate\Http\Request;
use App\Http\Requests\PackageRequest;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $packages = packages::latest()->paginate(3);
        return view("packages.index")->with("packages",$packages);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('packages.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
        //
        $packageData = $request->validated();

        packages::create([
            'package_name' => $packageData['package_name'],
            'package_weight' => $packageData['package_weight'],
            'created_by' => auth()->user()->id,
            'is_active' => $packageData['is_active']
        ]);

        return redirect()->route('packages.index')->with('success','Package created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(packages $packages)
    {
        //
        return view('packages.show',compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $packages = packages::find($id);
        return view('packages.edit',compact('packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageRequest $request, packages $packages)
    {
        //
        $request->validate([

            'package_name' => 'required',
            'package_weight' => 'required',
            'is_active' => 'required',
        ]);

        $packages->update([
            'package_name' => $packagesData['package_name'],
            'package_weight' => $packagesData['package_weight'],
            'updated_by' => $packagesData['updated_by'],
            'is_active' => $packagesData['is_active']
        ]);

        return redirect()->route('packages.index')->with('success','Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $packages = packages::find($id);

        $packages->delete();
        return redirect()->route('packages.index')->with('success','Package deleted successfully');
    }
}
