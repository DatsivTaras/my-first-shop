@extends('layouts/admin')

@section('content')

<form method='POST' action="{{ route('admin.categories.update', $categori->id) }}">
@method('PUT')
@csrf
  <div class="mb-3">
    <label  class="form-label">Редагувати Категорію</label>

    <input value='{{$categori->name}}' name='name' type="text" class="form-control" >
  </div>
  <div align='center'>
    <button type="submit" class="btn btn-primary">Редагувати</button>
</div>
</form>
@endsection
