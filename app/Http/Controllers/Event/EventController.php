<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $customerName = Customer::find($request->customer)->name;
        Event::create([
            'customer_id' => $request->customer,
            'text' => $customerName . ' - ' . $request->procedimento,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'color' => 'purple',
        ]);
        return redirect()->route('home');
    }

    public function showEvents(){
        $data = [];

        $events = Event::all();
        foreach($events as $key=>$event){
            $name = $this->getNameAndProcedimento($event->text)[0];
            $procedimento = $this->getNameAndProcedimento($event->text)[1];
            $date_init = $this->getDataAndTime($event->start_date)[0];
            $time_init = $this->getDataAndTime($event->start_date)[1];
            $date_end =  $this->getDataAndTime($event->end_date)[0];
            $time_end =  $this->getDataAndTime($event->end_date)[1];

            $eventos = ([
                'id'=>$event->id,
                'customer_id'=>$event->customer_id,
                'name'=>$name,
                'procedimento'=>$procedimento,
                'start_date'=>$date_init,
                'end_date'=>$date_end,
                'time_init'=>$time_init,
                'time_end'=>$time_end,
            ]); 
            array_push($data, $eventos);
        }

        return view('admin.schedule', compact('data'));

    }
    private function getNameAndProcedimento($text):array{
       return explode(' - ', $text);
    }
    private function getDataAndTime($date){
        return explode(' ', $date);
    }
    public function store()
    {
        $events = new Event();

        return response()->json([
            "data" => $events->all(),
        ]);
    }
}
