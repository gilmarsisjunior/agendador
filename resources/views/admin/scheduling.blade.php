@extends('layout.home')
@section('title', 'Agenda')

@section('content')

   <form action="{{route('register.schedule')}}" method="post" style="min-height: 90vh; display: flex; justify-content:center; align-items:center">
      <div class="form-group col-md-4 p-5">

      
      @csrf
   <div class="form-group">
   <label for="customer">Paciente</label>
   <select name="customer" id="customer"  class="form-control" >
      @foreach ($customers as $customer)
      <option value="{{$customer->id}}">{{$customer->name}}</option>
      @endforeach
   </select>
   </div>

   <div class="form-group mt-3">
      <label for="procedure">Procedimento</label>
      <select name="procedure" id="procedure"  class="form-control" >
         @foreach ($procedures as $procedure)
             <option value="{{$procedure->id}}">{{$procedure->procedure}}</option>
         @endforeach
      </select>
   </div>
   
   <div class="form-group  mt-3">
      <label for="customer">Data Início</label>
      <input type="datetime-local" class="form-control " id="start_date" name="start_date">
      <label for="customer">Data Fim</label>
      <input type="datetime-local" class="form-control"  id="end_date" name="end_date">
   </div>
  <div class="form-group mt-3" style="text-align: center">
   <button type="submit" class="btn btn-primary">Agendar</button>
  </div>
   
</div>
   </form>
@endsection

@section('scripts')
    
@endsection