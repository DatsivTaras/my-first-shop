@extends('layouts/admin')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>

            </tr>
        </thead>
        @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td><a href='/orders/{{$order->id}}' class ="btn btn-primary">Відкрити замовлення</a></td>
                </tr>
        @endforeach
    </table>
@endsection
