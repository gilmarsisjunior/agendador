@extends('layout.home');
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
        <th scope="col">Edit/Remove</th>
      </tr>
    </thead>
    <tbody  id="customers">
    <img src="" alt="">
    </tbody>
  </table>
@endsection

@push('scripts')
<script>
    $.get( "http://127.0.0.1:8000/api/clientes", function( data ) {
     $.each(data.values, (index,values)=>{
        $("#customers").prepend(
            "<tr id='line'>"
            +"<td>"+values.name+"</td>"
            +"<td>"+values.email+"</td>"
            +"<td>"+values.address+"</td>"
            +"<td>"+values.telephone+"</td>"
            +"<td> <a href='google.com'><img src='{{asset('admin/customers/icons/pencil-square.svg')}}' alt=''><a/> <a href='google.com'><img src='{{asset('admin/customers/icons/close.svg')}}'<a/>"
            +"</tr>");

     })  

});
</script>
@endpush