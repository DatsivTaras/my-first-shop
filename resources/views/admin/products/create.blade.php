@extends('layouts/admin')

@section('content')

<form method="POST" action="{{ route('admin.products.store') }}">
@csrf
  <div class="mb-3">
    <label  class="form-label">Імя Товару</label>
    <input name='name' type="text" class="form-control" >
    </div>
    <select name='category_id' class="form-select" aria-label="Default select example">
        @foreach($categories as $categori )

            <option value="{{$categori->id}}">{{$categori->name}}</option>

      @endforeach
  </select><br>
  <div align='center'>
    <button type="submit" class="btn btn-primary">Додати</button>
  </div>
</form>

@endsection
