@extends('layouts/admin')
@section('content')
    <form method='POST' action="{{ route('admin.products.update', $product->id) }}">
        @method('PUT')
        @csrf
        <h1 align='center'>Редагувати Товар</h1><br>
        <div class="mb-3">
            <input value='{{$product->name}}' name='name' type="text" class="form-control" >
        </div>
        <select name='category_id' class="form-select" aria-label="Default select example">
            @foreach($categories as $categori )
                <option value="{{$categori->id}}">{{$categori->name}}</option>
            @endforeach
        </select><br>
        <div class="mb-3">
            <input value='{{$product->price}}' name='price' type="text" class="form-control" >
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Опис</label>
            <textarea name='description' class="form-control"  rows="3">{{$product->description}}</textarea>
        </div>

        <div align='center'>
            <br><button type="submit" class="btn btn-primary">Редагувати</button>
        </div>

    </form>
@endsection
