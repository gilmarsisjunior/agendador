@extends('layout.home')
@section('title', 'Agenda')

@section('content')
 @if (session('msg'))
  <div class="alert alert-info">
    {{ session('msg') }}
  </div>
  @endif


  <div style="display:flex; justify-content:flex-end; align-items:center">
   <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSchedule">
     Novo Agendamento
   </button>
 </div>
 
 
 <!-- Botão para acionar modal -->
 
 
 <div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="Modal">Novo Cliente</h5>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="addUserForm" method="POST">
           @csrf
           <div class="form-group">
            <label for="customer">Paciente</label>
            <select name="customer" id="customer"  class="form-control" >
               @foreach ($datas["customers"] as $customer)
               <option value="{{$customer->id}}">{{$customer->name}}</option>
               @endforeach
            </select>
            </div>
         
            <div class="form-group mt-3">
               <label for="procedure">Procedimento</label>
               <select name="procedure" id="procedure"  class="form-control" >
                  @foreach ($datas["procedures"] as $procedure)
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
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
             <input type="submit" value="Cadastrar" class="btn btn-outline-success">
           </div>
         </form>
       </div>
       
     </div>
   </div>
 </div>


































<div>
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
            <a href="{{route('delete.agendamento', $event['id'])}}"><img src="{{asset('admin/customers/icons/trashcan.png')}}" alt=""></a>
              
            
         </td>
        </tr>
    @endforeach
    
   </tbody>
 </table>
@endsection

@section('scripts')
    
@endsection