@extends('layouts/admin')

@section('content')

<form method='POST' action="{{ route('admin.products.update', $product->id) }}">
@method('PUT')
@csrf
<h1 align='center'>Редагувати Товар</h1><br>
  <div class="mb-3">
    <input value='{{$product->name}}' name='name' type="text" class="form-control" >
  </div>
    <div align='center'>
        <br><button type="submit" class="btn btn-primary">Редагувати</button>
    </div>
</form>
@endsection
