@extends('layout.home')
@section('title', 'Agenda')
@push('topScripts')
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
   <script src="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.js"></script>
   <link href="https://cdn.dhtmlx.com/scheduler/edge/dhtmlxscheduler.css"rel="stylesheet">
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
    scheduler.init("scheduler_here");
 </script>
@endpush