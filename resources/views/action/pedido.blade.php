@extends('adminlte::page')

@section('title', 'Minhas Páginas')

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
                    <th width='50'>Nome</th>
                    <th>Endreço</th>
                    <th>pizzas</th>
                    <th>Descrição</th>
                    <th>valor total</th>
                    <th width='200'>Ações</th>
                </tr>
            </thead>
           <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->name}}</td>
                    <td>{{$pedido->address}}</td>
                    <td>{{$pedido->pizza}}</td>
                    <td>{{$pedido->description}}</td>
                    <td>R$ {{number_format((float)$pedido->price, 2, ',', '')}}</td>
                    <td>
                        <a href="" target="_blank" class="btn btn-sm btn-success">Feita</a>
                        <a href="{{route('pedido.edit',[$pedido->id])}}" class="btn btn-sm btn-info">Editar</a>
                        <form class="d-inline" action="{{route('pedido.destroy',[$pedido->id])}}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar esse pedido?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Cancelar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
           </tbody>


        </table>
    </div>
</div>

@endsection
