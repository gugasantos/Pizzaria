<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pizzas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pedido::all();

        return view('action.pedido',[
            'pedidos' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action.createPedido');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'address',
            'pizza',
            'description',
            'price',

        ]);
        $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:100'],
            'pizza' => ['required', 'string', 'max:100'],
            'price' => ['required', 'string'],
            'description' => ['required', 'string' , 'max:100']
         ]);


        if($validator->fails()){
            return redirect()->route('create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $pedido = new Pedido;
        $pedido->name = $data['name'];
        $pedido->address = $data['address'];
        $pedido->pizza = $data['pizza'];
        $pedido->price = $data['price'];
        $pedido->description = $data['description'];
        $pedido->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pedido::find($id);

        if($data){
            return view('action.editPedido',[
                'pedido' => $data
            ]);
        }
        return redirect()->route('index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pedido::find($id);
        $data->delete();

        return redirect()->route('pedido.index');
    }
}
