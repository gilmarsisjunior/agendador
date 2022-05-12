<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerApiController extends Controller
{
    public function getCustomers(){
        $customers =Customer::all();
        return response()->json([
            "data" => $customers->all()
        ]);
    }
}
