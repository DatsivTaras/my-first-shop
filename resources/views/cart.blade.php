@extends('layouts/app')

@section('content')

@if ($order && $order->products()->exists())
    <div align='center'>
        <h1   >Кошик</h1>
    </div>
    @foreach ($order->products as $product)
        <div class="js-product-{{$product->products->id}} container">
            <div class="row no-gutters">
                <article class="card-body border-bottom" data-product-id="228370978" data-item-id="389573775">
                    <div class="row align-items-center">
                        <figure class="media">
                            <a  data-fancybox class="img-wrap mr-3">
                                <img width="130" src=https://globaltendence.guu.ru/img/220984-200.png class="border img-sm">
                            </a>
                            <figcaption class="media-body">
                                <div align='right'>
                                    <a class='js-delete-product' data-id='{{$product->products->id}}' ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/></svg>
                                    </a>
                                </div>
                                <a href="/product/airpods-2?variant_id=389573775" class="title h4"><a href=/product/{{$product->products->id}}><h4>{{$product->products->name}}</h4></a>
                                <div class="price-wrap"><span data-item-price><h5>{{$product->products->price}} </h5></span></div>
                            </figcaption>
                        </figure>
                    </div>
                </article>
            </div>
        </div>
    @endforeach
    <br><br><br><div style="padding-left:115px;" align='left'>
        <h3 >Загальна сума: <b class='js-sum-products'>{{$sumPrice}} ₴</b></h3>
    </div>

    <!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
 <link href='https://bootstraptema.ru/snippets/form/2017/recaptcha/custom.css' rel='stylesheet' type='text/css'>
 </head>
    <body>
        <div class="js-all-products ">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="text-center">Оформлення замовлення</h1>
                        <form id="contact-form" method="post" action="/makingAnOrder" role="form">
                        @csrf
                        <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Прізвище *</label>
                                            <input  type="text" name="name" class="form-control" placeholder="Введіть ваше Прізвище*" required="required" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Імя *</label>
                                            <input  type="text" name="surname" class="form-control" placeholder="Введіть ваше ім'я*" required="required" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_address">Адрес *</label>
                                            <input  type="address" name="address" class="form-control" placeholder="Введіть адрес доставки*" required="required">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_phone">Телефон</label>
                                            <input  type="tel" name="phone" class="form-control" placeholder="Введіть ваш телефон*">
                                        </div>
                                    </div>
                                </div>
                                <br><br><div class="row">
                                    <br><br><div align='center' class="col-md-12">
                                        <input type="submit" class="btn btn-success btn-send" value="Підтвердити замовлення">
                                    </div>
                                </div>
                            </div>
                        </form>
                </div><!-- /.col-lg-8 col-lg-offset-2 -->
            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </body>
</html>

    @else
        <br><br><br><br><br><br><br><br><div class='js-not-products' align = 'center'>
        <img src="https://xl-static.rozetka.com.ua/assets/img/design/modal-cart-dummy.svg" width="189" height="525" >
        <h2>Корзина пуста</h2><br>
        <h5>Но це ніколи не пізно виправити :)</h5>
        <br><h5><a style=color:blue href='/prodducts'>Перейти до покупок</a></h5>
    </div>
    @endif
    <script>
    $(function(){
        $(document).on('click', '.js-delete-product', function(){
            var id = $(this).data('id');
            $.ajax({
                method: 'post',
                url: "/order/delete",
                data:{
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
            }).done(function(result) {

                $('.js-product-'+id).remove();
                location.reload();
                $('.js-add-product').text(result['count_product']);
                $('.js-sum-products').text(result['sumPrice']+ ' ₴');

            });
        });
    });
</script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
