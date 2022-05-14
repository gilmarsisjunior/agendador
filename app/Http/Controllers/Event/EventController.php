<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'attend'=> 0,
            'color' => 'purple',
        ]);
        return redirect()->route('home');
    }

    public function showEvents(){
        $data = [];
        
        $events = DB::table('events')->orderBy('attend', 'desc')->get();
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
                'attend'=>$event->attend,
                'name'=>$name,
                'procedimento'=>$procedimento,
                'start_date'=>$date_init,
                'end_date'=>$date_end,
                'time_init'=>$this->formatHour($time_init),
                'time_end'=>$this->formatHour($time_end),
            ]); 
            array_push($data, $eventos);

        }

        return view('admin.schedule', compact('data'));

    }

    public function attendCustomer(Request $request){
        DB::table('events')->where('id', $request->id)->update(['attend'=>1]);
        return back()->with('msg', 'Concluído');
    }



    















    private function formatHour($hour){
        $hour = explode(':' , $hour);
        return $hour[0].':'.$hour[1];
      
    }
    private function getNameAndProcedimento($text):array{
       return explode(' - ', $text);
    }
    private function getDataAndTime($date){
         $date = explode(' ', $date);
        return [$this->formatDate($date[0]), $date[1]];
    }
    public function formatDate($date){
       
        $date = explode('-', $date);
        $date = $date[2].'/'.$date[1].'/'.$date[0];
       
        return $date;
    }
    public function store()
    {
        $events = new Event();

        return response()->json([
            "data" => $events->all(),
        ]);
    }
}
