@extends('layouts/app')

@section('content')

    <div class="js-all-products ">
        <div class="row">
            <div align='center'>
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="text-center">Особисті дані</h1>
                        <form id="contact-form" method="post" action="/profile/update" role="form">
                            @csrf
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div align='left' class="form-group">
                                            <label for="form_name">Імя *</label>
                                            <input  type="text" name="name" value='{{$user->name}}' class="form-control" placeholder="Введіть ваше Прізвище*"  >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div align='left' class="form-group">
                                            <label for="form_lastname">Прізвище *</label>
                                            <input  type="text" name="surname" value='{{$user->surname}}' class="form-control" placeholder="Введіть ваше ім'я*"  >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div align='left' class="form-group">
                                            <label for="form_address">Адрес *</label>
                                            <input  type="address" name="address" value='{{$user->address}}' class="form-control" placeholder="Введіть адрес доставки*" >
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div align='left' class="form-group">
                                            <label for="form_phone">Телефон</label>
                                            <input id="form_phone" type="tel" name="phone" value='{{$user->phone}}' class="form-control" placeholder="Введіть ваш телефон*">
                                        </div>
                                    </div>
                                </div>
                                <br><br><div class="row">
                                    <br><br><div align='center' class="col-md-12">
                                        <input type="submit" class="js-save-profile btn btn-success btn-send" data-id='{{$user->id}}' value="Зберегти">
                                        <a href='/profile'>Скасувати<a>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
