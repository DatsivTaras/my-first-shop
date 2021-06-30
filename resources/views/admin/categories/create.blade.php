@extends('layouts/admin')

@section('content')

<form method="POST" action="{{ route('admin.categories.store') }}"> 
@csrf
  <div class="mb-3">
    <label  class="form-label">Імя Категорії</label>
    <input name='name' type="text" class="form-control" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection