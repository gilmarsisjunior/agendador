<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Redirect;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        \DB::table('customers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'telephone' => $request->telephone,
        ]);

    }

    public function show()
    {
        $customers = $this->getCustomers();
        return view('admin.customer', compact('customers'));
    }

    public function getCustomers()
    {
        $url = $_SERVER['PATH_INFO'];
        $url = str_replace('/', '', $url);
        $customers = Customer::get();
        $procedures = Procedure::get();
        if ($url === 'agendar') {
            return view('admin.scheduling', ['customers'=>$customers, 'procedures'=>$procedures]);
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
