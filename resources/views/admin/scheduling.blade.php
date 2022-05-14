@extends('layout.home')
@section('title', 'Agenda')

@section('content')
   <form action="{{route('register.schedule')}}" method="post">
      @csrf
   <select name="customer" id="customer">
      @foreach ($customers as $customer)
      <option value="{{$customer->id}}">{{$customer->name}}</option>
      @endforeach
      
   </select>
   <select name="" id="" >
      @foreach ($procedures as $procedure)
          <option value="{{$procedure->procedure}}">{{$procedure->procedure}}</option>
      @endforeach
   </select>
   <input type="datetime-local" id="start_date" name="start_date">
   <input type="datetime-local" id="end_date" name="end_date">
   <button type="submit">Agendar</button>
   </form>
@endsection

@section('scripts')
    
@endsection