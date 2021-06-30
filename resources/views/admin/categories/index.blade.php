@extends('layouts/admin')


@section('content')
 
    <h1 align='center'>Категорії</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id </th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    <div align='right'>
        <a class="btn btn-primary" href="categories/create" >Добавити Категорію</a><br><br>
    </div>
    @foreach ($categories as $categori) 
    <tr>
      <th scope="row">{{$categori->id}}</th>
      <td>{{$categori->name}}</td>
      <td>
        <form id="destroy-form" method="POST" action="{{ route('admin.categories.destroy', $categori->id) }}">
          @method('DELETE')
          @csrf
          <button>Видалити</button>
        </form>
          <td>
            <a href="{{ route('admin.categories.edit', $categori->id) }}">Редагувати</a>
          </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

