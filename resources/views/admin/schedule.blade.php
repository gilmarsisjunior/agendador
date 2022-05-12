@extends('layout.home')
@section('title', 'Agenda')

@section('content')
<div>
   <div class="d-flex justify-content-between" style="align-items:center; width: 90%">
      <div>
         <h4>Agenda</h4>
      </div>
      <div >
         <a  href="/agendar" role="button" class="btn btn-primary" ><img title="Agendar um horário" src="{{asset('admin/customers/icons/plus-circle.svg')}}"></a>
      </div>
      
       
   </div>
</div>
<table class="table" style="text-align: center">
   <thead>
     <tr>
       <th scope="col">Nome</th>
       <th scope="col">Procedimento</th>
       <th scope="col">Data</th>
       <th scope="col">Início</th>
       <th scope="col">Fim</th>
       <th scope="col">Opções</th>
     </tr>
   </thead>
   <tbody>
    @foreach ($data as $event)
        <tr>
           <td>{{$event['name']}}</td>
           <td>{{$event['procedimento']}}</td>
           <td>{{$event['start_date']}}</td>
           <td>{{$event['time_init']}}</td>
           <td>{{$event['time_end']}}</td>
           <td>
              
            <a href="#"><button type="button" class="btn btn-success btn-sm">Atendido</button></a>
            <a href="#"><button type="button" class="btn btn-primary btn-sm">Atualizar</button></a>
            <a href="#"><img src="{{asset('admin/customers/icons/trashcan.png')}}" alt=""></a>
              
            
         </td>
        </tr>
    @endforeach
    
   </tbody>
 </table>
@endsection

@section('scripts')
    
@endsection