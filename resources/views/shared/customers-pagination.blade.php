
<div class="container" style=" text-align:center">
    @if (session('msg'))
    <div class="alert alert-info">
      {{ session('msg') }}
    </div>
    @endif
  </div>
  
<strong style="color: gray">Clientes</strong>

<table class="table table-borderless" style="text-align: center">

    <thead class="table">
      
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
       
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody  id="customers">
      @foreach ($customers as $value)
          <tr>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->address}}</td>
              <td>{{$value->telephone}}</td>
              
              <td><a href="{{route('customer.update', $value->id)}}" ><img src="{{asset('admin/customers/icons/edit-icon.svg')}}" alt=""></a><a href="{{route('customer.delete', $value->id)}}"><img src="{{asset('admin/customers/icons/trashcan.png')}}"></a></td>
              
             
          </tr>
      @endforeach  



    </tbody>

  </table>

  {{$customers->links()}}    

  
  