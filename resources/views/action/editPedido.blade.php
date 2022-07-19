@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')
    <h1>
    Editar Pedido
    </h1>
@endsection


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5>
                    <i class="icon fas fa-ban"></i>
                    Ocorreu um erro
                </h5>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="card">
        <div class="card-body">

            <form action="{{route('update', [$pedido->id])}}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <textarea name="address" class="form-control" >{{old('address')}}</textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">pedidos</label>
                    <div class="col-sm-10">
                        <textarea name="pedido" class="form-control" >{{old('pedido')}}</textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" >{{old('description')}}</textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Preço Total</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>


            </form>

        </div>

    </div>


@endsection
