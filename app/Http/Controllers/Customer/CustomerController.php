<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
        
        $customer = DB::table('customers')->insert([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'telephone' => $number,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        if($customer){
            return true;
        }
        else return false;

    }   

    public function show()
    {
        $customers = $this->getCust();
        return view('admin.customer', compact('customers'));
    }

    public function getCtm(Request $request){
        if($request->ajax()){
            $customers = $this->getCust();
        return view('shared.customers-pagination', compact('customers'))->render();
        }
    }

    public function getCust(){

        $customers = Customer::orderBy("created_at", 'desc')->paginate(6);
        return $customers;
    }

    public function getCustomers()
    {
        $url = $_SERVER['PATH_INFO'];
        $url = str_replace('/', '', $url);
        $customers = Customer::get();
        $procedures = Procedure::get();
        if ($url === 'agenda') {
            return view('admin.scheduling', ['datas'=>$customers, 'procedures'=>$procedures]);
        } else {
            return $customers;
        }

    }
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();
        if ($customer) {
            return redirect::back()->with('msg', 'O Cliente foi excluído com sucesso!');
        } else {
            return redirect::back()->with('msg', 'O Cliente não pôde ser excluído!');
        }

    }
    public function store($id)
    {
        dd($id, 'update');
    }

}
