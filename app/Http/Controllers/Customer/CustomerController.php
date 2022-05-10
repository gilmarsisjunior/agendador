<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request){

        \DB::table('customers')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'telephone'=>$request->telephone,
        ]);

    }



    public function show(){
        $customers = \DB::table('customers')->get();
        return response()->json([
            "values"=>$customers,
        ]);
    }


















    public function format_date($datetime_format){
        $datetime_format = explode('T', $datetime_format);
        $datetime = $datetime_format[0].' ' .$datetime_format[1];
        return $datetime;
    }
}
