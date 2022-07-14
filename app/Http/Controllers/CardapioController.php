<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function cardapio(){
        $data = Pizzas::all();

        return view('action.cardapio',[
            'pizzas' => $data
        ]);
    }

    public function addpedido(){

    }

}
