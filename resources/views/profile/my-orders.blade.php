@extends('layouts/app')

@section('content')

<div class="container-fluid">
      <div class="row">
        <header class="col-md-2">
          <nav class="sidebar-sticky  navbar-expand-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto flex-column">
                <li class="nav-item">
                  <a class="btn btn-primary" href="/profile" class="nav-link">Мій кабінет</a>
                </li><br>
                <li class="nav-item">
                  <a class="btn btn-primary" href="/profile/my-orders" class="nav-link">Замовлення</a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
    <main class="col-md-9">

<table class="table">
    <thead>
        <tr>
            <th scope="col">Номер заказу</th>
            <th scope="col">Статус</th>
            <th scope="col">Дата</th>
            <th scope="col">Сумма</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th scope="row">№{{$order->id}}</th>
                <td>Статус</td>
                <td>{{$order->updated_at->format('j-M-Y ')}}</td>
                <td>{{$order->sum}} ₴</td>
                <td><a  onclick="view('hidden{{$order->id}}'); return false">Розгорнути</a></p></td>
            </tr>
            <tr id="hidden{{$order->id}}" style="display: none;">
                @foreach ($order->products as $product)
                    <td colspan="5">
                        {{$product->products->id}}
                    </td>
                    <td colspan="5">
                        {{$product->products->name}}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>











<script>function view(n) {
    style = document.getElementById(n).style;
    style.display = (style.display == 'block') ? 'none' : 'block';
}</script>
@endsection
