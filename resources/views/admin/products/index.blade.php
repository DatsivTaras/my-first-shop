@extends('layouts/admin')


@section('content')

    <h1 align='center'>Товари</h1>
    <div align='right'>
        <a class="btn btn-primary" href="products/create" >Добавити Товар</a><br><br>
    </div>

<table class="table">
  <thead>
    <tr>

      <th scope="col">Імя</th>
      <th scope="col">Категорія</th>
      <th scope="col">Ціна</th>
      <th scope="col">Опис</th>

    </tr>
  </thead>
  <tbody>

    @foreach ($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
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

