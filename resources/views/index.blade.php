
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
                        @foreach($categories as $categori)
                            <li class="nav-item">
                                <a class="btn btn-light" href="/prodducts/{{$categori['id']}}" class="nav-link">{{$categori['name']}}</a>
                            </li><br>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </header>
    <main class="col-md-9">
        <form method="get">
            <div class="input-group">
                <input  name='search' value="{{$valueSearch}}" type="search" class="form-control rounded" placeholder="Search" aria-label="Search">
                <select  name='filtering' class="form-select" aria-label="Default select example">
                    <option  {{ $valueSelect == 3 ? 'selected' : '' }}  value="3">Найновіші</option>
                    <option  {{ $valueSelect == 1 ? 'selected' : '' }}  value="1">Найдорожчі</option>
                    <option  {{ $valueSelect == 2 ? 'selected' : '' }}  value="2">Найдешевші</option>
                </select>
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div><br>
        </form>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <a href='/product/{{$product->id}}'>
                                    <img class="card-img-top" src="https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-12-pro-gold-hero?wid=470&hei=556&fmt=png-alpha&.v=1604021659000" alt="..." />
                                </a>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <a href='/product/{{$product->id}}'>
                                            <h5  class=" fw-bolder">{{$product->name}}</h5>
                                        </a>
                                    </div>
                                </div>
                                <div align='center' >
                                    Ціна : {{$product->price}}
                                </div><br>
                                <div align='center' >
                                    {{$product->created_at->format('j-M H:i');}}
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button class='js-add-cart js-product-{{$product->id}} btn btn-primary' data-id='{{$product->id}}'>{{  $product->inOrder(auth()->user()->id) ? 'В Кошику':'Купити'}} </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <footer class="py-2 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
<script>
    $(function(){
        $(document).on('click', '.js-add-cart', function(){
            var id = $(this).data('id');
            $.ajax({
                method: 'post',
                url: "/order/add-to-cart",
                data:{
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
            }).done(function(result) {
                if (result.status != 'error') {
                    $('.js-add-product').text(result['count_product']);
                    $('.js-product-'+id).text('В кошику');
                } else {
                    Swal.fire({
                    text: 'Товар вже є в корзині',
                    position: 'center',
                    })
                }

            });
        });
    });
</script>

@endsection

