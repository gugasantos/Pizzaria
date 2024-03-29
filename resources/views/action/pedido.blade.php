@extends('adminlte::page')

@section('title', 'Marinara Pizzaria')

@section('content_header')
    <h1>
    Pedidos
    <a href="{{route('pedido.create')}}" class="btn btn-sm btn-success">Adicionar novo pedido</a>
    </h1>
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endreço</th>
                    <th>Pizzas</th>
                    <th>Borda</th>
                    <th>Descrição</th>
                    <th>Valor total</th>
                    <th width='200'>Ações</th>
                </tr>
            </thead>
           <tbody>

            @foreach ($pedidos as $pedido)
                @if (($pedido->fineshed) === 0)
                    <tr>
                        <td>{{$pedido->name}}</td>
                        <td>{{$pedido->address}}</td>
                        <td>{{$pedido->pizza}}</td>
                        @if (($pedido->borda == 1))
                            <td>Sim</td>
                        @else
                            <td>Não</td>
                        @endif

                        <td>{{$pedido->description}}</td>
                        <td>R$ {{number_format((float)$pedido->price, 2, ',', '')}}</td>
                        <td>
                            <a href="{{route('pedido.show',[$pedido->id])}}" class="btn btn-sm btn-success">Feita</a>
                            <a href="{{route('pedido.edit',[$pedido->id])}}" class="btn btn-sm btn-info">Editar</a>
                            <form class="d-inline" action="{{route('pedido.destroy',[$pedido->id])}}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar esse pedido?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                @endif

            @endforeach
           </tbody>


        </table>
    </div>
</div>

@endsection
