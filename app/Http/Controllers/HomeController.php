<?php
/*
namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function pedido(){
        $data = Pedido::all();

        return view('action.pedido',[
            'pedidos' => $data
        ]);
    }


}
<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardapioController extends Controller
{
    public function cardapio(){
        $data = Pizzas::all();

        return view('action.cardapio',[
            'pizzas' => $data
        ]);
    }

    public function create(){

        return view('action.create');

    }
    public function store(Request $request){
        $data = $request->only([
            'name',
            'price',
            'description'
         ]);

         $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer'],
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

         return redirect()->route('action.cardapio');

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }

}
 */
