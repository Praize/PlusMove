<?php

namespace App\Http\Controllers;

use App\Models\delivery;
use Illuminate\Http\Request;
use App\Models\driver;
use App\Models\archives;
use App\Models\customer;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries =  DB::table('customers as C')
        ->join('packages as P','C.package_id','=','P.id')
        ->leftJoin('packages_to_drivers as PTD','P.id','=','PTD.package_id')
        ->leftJoin('drivers as D','PTD.driver_id','=','D.id')

        // ->select('O.id','O.site_name','OTG.organisation_id','OTG.group_id','O.service_type')
        ->orderBy('C.customers_name')
    
        ->get();
        $dataArray = array();

        foreach($deliveries as $delivery){
            $arr['id'] = $delivery->id;
            $arr['customers_name'] = $delivery->customers_name;
            $arr['customers_email'] = $delivery->customers_email;
            $arr['driver_name'] = $delivery->driver_name;
            $arr['driver_phonenumber'] = $delivery->driver_phonenumber;
            $arr['package_id'] = $delivery->package_id;
            $arr['package_name'] = $delivery->package_name;
            $arr['package_weight'] = $delivery->package_weight;
        //    $this->olderThanADay($delivery->package_id , $delivery->driver_name , $delivery->customers_name ,  $delivery->package_name);

            array_push($dataArray , $arr);
         
        }
   
  

        $drivers = driver::all();
 
 
        return view('dashboard', ['data' =>  count($drivers) , 'data1' => json_encode($dataArray) , 'percentage'=> rand(0, 100)]);

        
    }
    public function olderThanADay($package_id , $driver_name , $customers_name , $package_name)
    {
        $date =  DB::table('customers as C')->select('created_at')->get();
        $currentDate = date("Y-m-d H:i:s");
     
        $expirydate  = date("Y-m-d H:i:s",strtotime($date));//expiry
        $expired = strtotime($currentDate) - strtotime($expirydate);//date subtractions here!!!
        $insert['updated_at']         = date("Y-m-d H:i:s");
        $insert['created_at']         = date("Y-m-d H:i:s");
        $insert['driver_name']     = $driver_name;
        $insert['customers_name'] = $customers_name;
        $insert['package_name']         = $package_name;

 
     
 
        if( $expired > 10){
            archives::create(
                [$insert]
            );
        }
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customer = customer::where('is_active' ,1)->get();

        // $customer = driver::join('packages', 'packages.driver_id', '=', 'driver.id')->get();

        $driver   = driver::where('is_active' , 1)->get();

        return view('delivery.create' , ['customers' => $customer , 'drivers' => $driver]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return $request;

        return view('delivery.assign', ['customer' => $customer , 'driver' => $driver]);
    }

    /**
     * Display the specified resource.
     */
    public function show(delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(delivery $delivery , $id)
    {
        //
        // $customer = customer::where('is_active' ,1);
        // $driver   = driver::where('is_active' , 1);

        // return view('delivery.assign', ['customer' => $customer , 'driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(delivery $delivery)
    {
        //
    }

    /**
     * delivery metrics
     */
    // public function counts()
    // {
    //     //
    //     $drivers = driver::all();

    //     $data = array(
    //         "driver_count" => count($drivers)
    //     );
 
    //     return  view('dashboard')->with("data" , count($drivers));


    // }
}
