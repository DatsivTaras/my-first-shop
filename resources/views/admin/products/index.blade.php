@extends('layouts/admin')


@section('content')

    <h1 align='center'>Товари</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id </th>
      <th scope="col">Імя</th>
      <th scope="col">Категорія</th>

    </tr>
  </thead>
  <tbody>
    <div align='right'>
        <a class="btn btn-primary" href="products/create" >Добавити Товар</a><br><br>
    </div>
    @foreach ($products as $product)
    <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->category ? $product->category->name : ''}}</td>
        <td>
            <form id="destroy-form" method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                @method('DELETE')
                @csrf
                <button>Видалити</button>
            </form>
        </td>
        <td>
            <a class="" href="{{ route('admin.products.edit', $product->id) }}" > Редагувати</a><br><br>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

