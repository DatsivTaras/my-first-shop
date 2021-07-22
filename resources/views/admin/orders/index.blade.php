@extends('layouts/admin')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">імя </th>
                <th scope="col">статус</th>

            </tr>
        </thead>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$status[$order->status]}}</td>
                <td><a href='/orders/{{$order->id}}' class ="btn btn-primary">Відкрити замовлення</a></td>
                <td>
                    <form method = 'post' action = "{{ route('admin.status') }}">
                        @csrf
                        <input name = 'order_id' type="hidden" value = '{{$order->id}}' >
                        <select class="form-select" name = 'status'>
                            <option  {{ $order->status == 1 ? 'selected' : '' }}  value="1">Очікується на розгляд </option>
                            <option  {{ $order->status == 2 ? 'selected' : '' }}  value="2">Зоглядається </option>
                            <option  {{ $order->status == 3 ? 'selected' : '' }}  value="3">Приняте</option>
                            <option  {{ $order->status == 4 ? 'selected' : '' }}  value="4">Готове</option>
                        </select>
                        <button class='btn btn-success' type='submit'>Зберегти</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
