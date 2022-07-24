@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title','Painel')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$pizza}}</h3>
                    <p>Quantidade de Pizzas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie "></i>
                </div>
            </div>
        </div>
            <div class="col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$pedidos}}</h3>
                        <p>Quantidade de pedidos</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-fw fa-user"></i>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>R$ {{number_format((float)$valor, 2, ',', '')}}</h3>
                            <p>Valor Obtido</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Pizzas mais pedidas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>

            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Gráfico de valor arrecadado</h3>
                </div>
                <div class="card-body">
                    ...
                </div>

            </div>

        </div>
    </div>

@endsection
