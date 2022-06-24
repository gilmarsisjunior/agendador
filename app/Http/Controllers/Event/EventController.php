<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class EventController extends Controller
{
    public function index(Request $request)
    {

        $customerName = Customer::find($request->customer)->name;
        $procedure = Procedure::find($request->procedure);
        Event::create([
            'customer_id' => $request->customer,
            'procedure_id'=>$procedure->procedure,
            'text' => $customerName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'attend'=> 0,
            'color' => '#d4d323',
        ]);
        return redirect()->route('home');
    }


    public function destroy($id){
        $delete = Event::find($id)->delete();
        if ($delete) {
            return redirect::back()->with('msg', 'O agendamento foi excluído com sucesso!');
        } else {
            return redirect::back()->with('msg', 'O Agendamento não pôde ser excluído!');
        }
    }





    public function showEvents(){
        $data = [];
        
        $events = DB::table('events')->orderBy('attend', 'desc')->get();
        foreach($events as $key=>$event){
    
            $name = $this->getNameAndProcedimento($event->text)[0];
            $procedimento = $event->procedure_id;
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
        $customers = $this->getCustomers();
        return view('admin.schedule', ['data'=>$data, 'datas'=>$customers ]);

    }
    public function getCustomers()
    {
        $url = $_SERVER['PATH_INFO'];
        $url = str_replace('/', '', $url);
        $customers = Customer::get();
        $procedures = Procedure::get();
        if ($url === 'agenda') {
            return  ['customers'=>$customers, 'procedures'=>$procedures];
        } else {
            return $customers;
        }

    }
    public function attendCustomer(Request $request){
        $events = DB::table('events')->find($request->id);
        $customer = DB::table('customers')->find($events->customer_id);
        DB::table('events')->where('id', $request->id)
        ->update(['attend'=>1,
                  'color'=> '#128731',
                ]);
        return back()->with('msg', 'O Atendimento foi feito com sucesso!');
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
            "data" => DB::table('events')->get()
        ]);
    }
}
