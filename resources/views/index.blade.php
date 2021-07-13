@extends('layouts/app')

@section('content')

<script>
    $(function(){
        $(document).on('click', '.js-add-cart', function(){
            var id = $(this).data('id');
            $.ajax({
                method: 'post',
                url: "/order/add-to-cart",
                data:{
                    id:id ,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
            }).done(function(result) {
                console.log(result['count_product']);
                $('.js-add-product').text(result['count_product']);
            });
        });
    });
</script>
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
                                            <h5 class="fw-bolder">{{$product->name}}</h5>
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
                                        <button class='js-add-cart btn btn-primary'data-id= {{$product->id}}> В корзину</button>
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




@endsection


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
