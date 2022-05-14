@extends('layout.home')
@section('content')
<form action="{{url('/procedimento')}}" method="post">
    @csrf
    <input type="text" name="procedure" id="procedure">
    <input type="text" name="value" id="value">
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection

@push('scripts')
<script>

</script>

@endpush