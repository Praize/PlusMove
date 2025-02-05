<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;
use App\Http\Requests\DriverRequest;
use App\Models\packages;
use App\Models\packages_to_driver;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $drivers = driver::latest()->paginate(3);
        return view("drivers.index")->with("drivers",$drivers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        $driverData = $request->validated();
 
        driver::create([
            'user_id' => auth()->user()->id,
            'customer_id' => $driverData['customer_id'] ?? null,
            'driver_name' => $driverData['driver_name'],
            'driver_email' => $driverData['driver_email'],
            'driver_phonenumber' => $driverData['driver_phonenumber'],
            'is_active' => $driverData['is_active']
        ]);

        return redirect()->route('drivers.index')->with('success','Driver created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //show user details and assign packages
        $driver = driver::find($id);
        $packages = packages::where('is_active' ,1)->get();

        return view('drivers.show' , ['packages' => $packages , 'driver' => $driver]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $driver = driver::find($id);

        return view('drivers.edit',compact('driver'));
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, driver $driver)
    {
        //
        $request->validate([

            'driver_name' => 'required',
            'driver_email' => 'required',
            'driver_phonenumber' => 'required',
            'is_active' => 'required',
        ]);
        
        $driver->update([
            'customer_id' => $driverData['customer_id'] ?? null,
            'driver_name' => $driverData['driver_name'],
            'driver_email' => $driverData['driver_email'],
            'driver_phonenumber' => $driverData['driver_phonenumber'],
            '' => $driverData['is_active']
        ]);

 

        return redirect()->route('drivers.index')->with('success','Driver updated successfully');
    }

    /**
     * 
     * Assign
     * 
     */

     public function assign(Request $request){
        foreach($request->package as $package){
            //stores driver/package
                packages_to_driver::create([
                    'driver_id' => $request->id,
                    'package_id' => $package
                ]);
            }
    
        return redirect()->route('drivers.index')->with('success','Driver updated successfully');
     }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(driver $driver)
    {
        //
        $driver->delete();
        return redirect()->route('drivers.index')->with('success','Driver deleted successfully');
    }
}
