<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\packages;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Models\customers_to_packages;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = customer::latest()->paginate(3);
        return  view('customers.index')->with("customers",$customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = packages::where('is_active' ,1)->get();

        return view('customers.create' , ['packages' => $packages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $customerData = $request->validated();

        customer::create([
            'customers_name' => $customerData['customers_name'],
            'customers_email' => $customerData['customers_email'],
            'created_by' => auth()->user()->id,
            'is_active' => $customerData['is_active']
        ]);
        foreach($request->package as $package){
                  //stores packages/customer
            customers_to_packages::create([
                'customer_id' => $request->id,
                'package_id' => $package
            ]);
        }
  

        return redirect()->route('customers.index')->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        //
       
        $request->validate([

            'customers_name' => 'required',
            'customers_email' => 'required',
            'is_active' => 'required',
        ]);
        $customer->update([
            'customers_name' => $customerData['customers_name'],
            'customers_email' => $customerData['customers_email'],
            'updated_by' => auth()->user()->id,
            'is_active' => $customerData['is_active']
        ]);

        return redirect()->route('customers.index')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success','Customer deleted successfully');
    }
}
