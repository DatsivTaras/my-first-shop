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
      <td><a class="btn btn-danger" href="categories/destroy">Видалити</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

