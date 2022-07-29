@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title','Painel Marinara')

@section('content')
    <div class="row">
        <div class="col-md-6 ">
            <h1>Dashboard</h1>
        </div>

        <div class="col-md-6">
            <form action="{{route('dashboard')}}" method="GET" class="form-horizontal">
                <div class="float-md-right" style="display: flex">
                    <h5>Intervalo de dias:</h5>
                    <input type="number" name="interval" value="{{$days}}" class="form-control" style="margin: 0 15px; width:5rem">
                    <input type="submit" value="Calcular" class="btn btn-danger">
                </div>
            </form>

        </div>


    </div>
    <div class="row">

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
