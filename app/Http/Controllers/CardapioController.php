<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Pizzas::paginate(10);
        setlocale(LC_MONETARY,'pt_BR');
        return view('action.cardapio',[
            'pizzas' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action.create');
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
            'price',
            'description'
        ]);
        $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'string'],
            'description' => ['required', 'string' , 'max:100']
         ]);


        if($validator->fails()){
            return redirect()->route('action.create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $pizza = new Pizzas;
        $pizza->name = $data['name'];
        $pizza->price = $data['price'];
        $pizza->description = $data['description'];
        $pizza->save();

        return redirect()->route('cardapio.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pizzas::find($id);

        if($data){
            return view('action.edit',[
                'pizza' => $data
            ]);
        }
        return redirect()->route('cardapio.index');
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
        $pedido = Pizzas::find($id);
        if($pedido){
            $data = $request->only([
                'name',
                'price',
                'description'
            ]);
            $validator = Validator::make($data,[
                'name' => ['required', 'string', 'max:100'],
                'price' => ['required', 'string'],
                'description' => ['required', 'string' , 'max:100']

            ]);
            if($validator->fails()){
                return redirect()->route('cardapio.create')
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        $pedido->name = $data['name'];
        $pedido->price = $data['price'];
        $pedido->description = $data['description'];
        $pedido->save();

        return redirect()->route('cardapio.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pizzas::find($id);
        $data->delete();

        return redirect()->route('cardapio.index');
    }
}
