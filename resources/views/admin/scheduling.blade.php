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
   <input type="text" id="Procedimento" name="procedimento" placeholder="Procedimento">
   <input type="datetime-local" id="start_date" name="start_date">
   <input type="datetime-local" id="end_date" name="end_date">
   <button type="submit">Agendar</button>
   </form>
@endsection

@section('scripts')
    
@endsection