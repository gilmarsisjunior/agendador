@extends('layout.home')
@section('title', 'Agenda')

@section('content')
 @if (session('msg'))
  <div class="alert alert-info">
    {{ session('msg') }}
  </div>
  @endif
<div>
   <div class="d-flex justify-content-end" style="align-items:center;">
     
      <div >
         <a  href="/agendar" role="button" class="btn btn-primary" style="background-color: #6F93F7"><strong>+</strong> Novo Agendamento</a>
      </div>
       
   </div>
</div>
<strong style="color: gray">Agendados</strong>
<table class="table table-hover table-borderless" style="text-align: center;">
   <thead>
     <tr>
       <th>Nome</th>
       <th>Procedimento</th>
       <th>Data</th>
       <th>Início</th>
       <th>Fim</th>
       <th>Status</th>
       <th>Opções</th>

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
           @if ($event['attend'] == 0)
           <td style="color: #e7ff0b"><strong>Em espera</strong></td>
           @else
           <td style="color: #128731"><strong>Atendido</strong></td>
           @endif
           <td>
              @if ($event['attend'] !==1)
              <a href="{{route('attend.customer', $event['id'])}}"><img src="{{asset('admin/customers/icons/check.png')}}" alt=""></a>
              @endif
            
            <a href="#"><img src="{{asset('admin/customers/icons/edit-icon.svg')}}" alt=""></a>
            <a href="#"><img src="{{asset('admin/customers/icons/trashcan.png')}}" alt=""></a>
              
            
         </td>
        </tr>
    @endforeach
    
   </tbody>
 </table>
@endsection

@section('scripts')
    
@endsection