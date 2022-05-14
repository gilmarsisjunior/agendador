<?php

namespace App\Http\Controllers\Procedure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procedure;
use Illuminate\Support\Facades\DB;


class ProcedureController extends Controller
{
    public function index(Request $request){
        DB::table('procedures')->insert([
            'procedure'=>$request->procedure,
            'value'=>$request->value,
        ]);
        dd('SALVO');
    }
    public function store(){
        $procedures = DB::table('procedures')->get();
        return view('admin.procedures', compact('procedures'));
    }
}
