@extends('layout.home')
@section('title', 'Bem vindo ao Dentil')
@push('topScripts')
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
   <script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
   <link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler_material.css"rel="stylesheet">
   <script src="https://cdn.dhtmlx.com/scheduler/edge/locale/locale_pt.js" charset="utf-8"></script>
   <style type="text/css">
       html, body{
           height:100%;
           padding:0px;
           margin:0px;
           overflow: hidden;
       }

   </style>
@endpush
@section('content')
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">&nbsp;</div>
        <div class="dhx_cal_next_button">&nbsp;</div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_cal_date"></div>
        <div class="dhx_cal_tab" name="day_tab"></div>
        <div class="dhx_cal_tab" name="week_tab"></div>
        <div class="dhx_cal_tab" name="month_tab"></div>
    </div>
    <div class="dhx_cal_header"></div>
    <div class="dhx_cal_data"></div>
 </div>
@endsection

@push('scripts')
<script type="text/javascript">
    let data = new Date();
    let month = parseInt(data.getMonth())+1
    let today = ((data.getFullYear())) + "/" + month +"/"+ data.getDate();

console.log(today)


    scheduler.templates.event_text=function(start, end, event){
        console.log(event);
    return '<div> <strong style="text-shadow: black 0.1em 0.1em 0.2em;">Nome:</strong> &nbsp <p id="nome" name="nome" style="text-shadow: black 0.1em 0.1em 0.2em;">'+ event.text+'</p> </div>'+
    '<div> <strong style="text-shadow: black 0.1em 0.1em 0.2em;">Procedimento:</strong> &nbsp <p id="nome" name="nome" style="text-shadow: black 0.1em 0.1em 0.2em;">'+ event.procedure_id+'</p> </div>'+
    '<div> <strong style="text-shadow: black 0.1em 0.1em 0.2em;">Status:</strong> &nbsp <p id="nome" name="nome" style="text-shadow: black 0.1em 0.1em 0.2em;">'+ getStatus(event.attend)+'</p> </div> <br>'
}
    scheduler.config.date_format = "%Y-%m-%d %H:%i:%s";
    scheduler.config.hour_size_px = 350;
    scheduler.config.readonly = true;
    scheduler.config.scroll_hour = 07
    scheduler.config.separate_short_events = true;
    scheduler.config.show_loading = true;
    scheduler.config.update_render = true;
    scheduler.init("scheduler_here", new Date(today), "week");
    scheduler.load("/api/data", "json");



    function getStatus(attend){
        let status = '';
        attend !== 1 ? status = 'Em espera': status = 'Atendido';
        return status;
    }
 </script>
@endpush