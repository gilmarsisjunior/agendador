@extends('layout.home')
@section('content')
<div style="display:flex; justify-content:flex-end; align-items:center">
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
    Novo Cliente
  </button>
</div>


<!-- Botão para acionar modal -->


<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
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
            <label for="name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group col-md-8">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
          </div>
          <div class="row">
            <div class="form-group col-md-8">
              <label for="address" class="col-form-label">Endereço:</label>
              <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group col-md-4">
              <label for="number" class="col-form-label">Número:</label>
              <input type="text" class="form-control" name="number" id="number">
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

<span id="msg"></span>

<div id="customer-data">
  @include('shared.customers-pagination')
</div>

@endsection

@push('scripts')
<script>//list customers;   
 //oculta texto em inglês de quantidade de dados

$(document).ready(function(){

$(document).on('click', '.pagination a', function(ev){
  ev.preventDefault();
  let page = this.innerHTML;

 $.ajax(({
   type: "GET",
   url: '/clta'+ '?page='+page,
   success: (data)=>{
    $("#customer-data").html(data);

   }
 }))


})


})


  </script>
<script src="{{asset('admin/js/customer.js')}}"></script>

@endpush