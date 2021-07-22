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
<div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div align='right'>
                            <a href='/profile/edit'>Редагувати</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Імя</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Прізвище</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->surname ?  $user->surname : 'Не вказано '}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Телефон</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->phone ? $user->phone : 'Не вказана' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Адрес</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->address ?  $user->address : 'Не вказана '}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Електронна пошта</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {{$user->email ? $user->email : 'Не вказаний' }}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
