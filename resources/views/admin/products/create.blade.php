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
    <div class="mb-3">
        <label  class="form-label">Ціна</label>
        <input  name='price' type="text" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Опис</label>
        <textarea name='description' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  <div align='center'>
    <button type="submit" class="btn btn-primary">Додати</button>
  </div>
</form>

@endsection
