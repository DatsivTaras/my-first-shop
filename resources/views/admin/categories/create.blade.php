@extends('layouts/admin')

@section('content')

<form method="POST" action="{{ route('admin.categories.store') }}">
@csrf
  <div class="mb-3">
    <label  class="form-label">Імя Категорії</label>
    <input name='name' type="text" class="form-control" >
  </div>
  <div align='center'>
    <button type="submit" class="btn btn-primary">Додати</button>
</div>
</form>

@endsection
