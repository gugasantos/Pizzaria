<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pizzas;
use Illuminate\Http\Request;

class DashoboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //contagem de pizzas
        $pizzacount = (Pizzas::all()->count());

        //contagem de pedidos
        $pedidoscount = (Pedido::all()->count());

        //contagem de valor adquirido até então
        $lucros = array();
        $lucrocount = (pedido::all());
        foreach($lucrocount as $lucro){
            array_push($lucros, $lucro->price);
        }
        $lucros = (array_sum($lucros));

        return view('action.dashboard',[
            'pizza' => $pizzacount,
            'pedidos' => $pedidoscount,
            'valor' => $lucros
        ]);
    }
}
