@extends('layouts/admin')


@section('content')


    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Імя товару</th>
                <th scope="col">Ціна</th>
                <th scope="col">Кількість</th>

            </tr>
        </thead>
            @foreach ($orders as $order)
            {{'id: '}}<b>{{$order->id}}</b><br>
            {{'Користувач: '}}<b>{{$order->user->name}}</b>
                @foreach($order->Products as $product)

                <tr>
                    <td>{{$product->products->id}}</td>
                    <td>{{$product->products->name}}</td>
                    <td>{{$product->products->price}}</td>

                </tr>
                @endforeach
            @endforeach
            </table>
@endsection

