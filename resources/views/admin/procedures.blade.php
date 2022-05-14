@extends('layout.home')
@section('title', 'Agenda')

@section('content')
 
  
<div>
   <div class="d-flex justify-content-end" style="align-items:center;">
     
      <div >
         <a  href="/procedimento" role="button" class="btn btn-primary" style="background-color: #6F93F7"><strong>+</strong> Novo Procedimento</a>
      </div>
       
   </div>
</div>
<strong style="color: gray">Procedimentos</strong>
<table class="table table-hover table-borderless" style="text-align: center;">
   <thead>
     <tr>
       <th>#ID</th>
       <th>Procedimento</th>
       <th>Valor</th>
       <th>Opções</th>

     </tr>
   </thead>
   <tbody>
        <tr>
            @foreach ($procedures as $procedure)
                
            
           <td>{{$procedure->id}}</td>
           <td>{{$procedure->procedure}}</td>
           <td>{{$procedure->value}}</td>
            <td>
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