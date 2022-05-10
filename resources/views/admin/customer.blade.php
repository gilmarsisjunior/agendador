@extends('layout.home');
@section('content')
<div style="width: 94%; height:60px; display:flex; justify-content:flex-end; align-items:center">
    <div>
        <a class="btn btn-primary" href="#" role="button"> <img src="{{asset('admin/customers/icons/plus-circle.svg')}}" alt="Adicionar Cliente" title="Adicionar Cliente" srcset="Adicionar Cliente"></a>
    </div>
</div>

<table class="table" style="text-align: center">
    <thead class="table-primary">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
        <th scope="col">Edit/Remove</th>
      </tr>
    </thead>
    <tbody  id="customers" class="table-info">
      @foreach ($customers as $value)
          <tr>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->address}}</td>
              <td>{{$value->telephone}}</td>
              <td><a href="{{route('customer.update', $value->id)}}" ><img src="{{asset('admin/customers/icons/pencil-square.svg')}}" style="margin-right: 10px"></a><a href="{{route('customer.delete', $value->id)}}"><img src="{{asset('admin/customers/icons/close.svg')}}"></a></td>
              
             
          </tr>
      @endforeach  

    </tbody>
  </table>
@endsection

@push('scripts')
<script>

</script>

@endpush