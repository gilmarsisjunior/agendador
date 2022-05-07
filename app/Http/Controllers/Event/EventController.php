<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event; 

class EventController extends Controller
{
    public function index(){ 
        $events = new Event();
 
        return response()->json([
            "data" => $events->all()
        ]);
    }
}
