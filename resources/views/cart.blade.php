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
    <br><br><br><div style="padding-left:400px;" align = 'left'>
        <h3 >Загальна сума: <b class='js-sum-products'>{{$sumPrice}} ₴</b></h3>
    </div>
    <hr>

    <!DOCTYPE html>
<html>
 <head>
</head>
    <body>
        <div class="js-all-products ">
            <div class="row">
            <div align='center'>
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="text-center">Оформлення замовлення</h1>
                        <form id="contact-form" method = "post" action = "/makingAnOrder" role = "form">
                            @csrf
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Імя *</label>
                                            <input  type = "text" value = '{{$user->name}}' name = "name" class = "form-control" placeholder = "Введіть ваше Прізвище*" required = "dsf" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Прізвище *</label>
                                            <input  type = "text" value = '{{$user->surname}}' name = "surname" class = "form-control" placeholder = "Введіть ваше ім'я*" required = "required" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for = "form_address">Адрес *</label>
                                            <input  type = "address" value = '{{$user->address}}' name = "address" class = "form-control" placeholder = "Введіть адрес доставки*" required = "required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for = "form_phone">Телефон</label>
                                            <input id = "form_phone" type = "tel" value = '{{$user->phone}}' name = "phone" class = "form-control" placeholder = "Введіть ваш телефон*"required = "required">
                                        </div>
                                    </div>
                                </div>
                                <br><br><div class="row">
                                    <br><br><div align = 'center' class = "col-md-12">
                                        <input type = "submit" class = "btn btn-success btn-send" value = "Підтвердити замовлення">
                                    </div>
                                </div>
                            </div>
                        </form>
                </div><!-- /.col-lg-8 col-lg-offset-2 -->
            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </div>
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
                if(result['count_product'] == 0 ){
                    location.reload();
                }

                $('.js-product-'+id).remove();

                $('.js-add-product').text(result['count_product']);
                $('.js-sum-products').text(result['sumPrice']+ ' ₴');


            });
        });
    });
</script>



@endsection



