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
    public function index(Request $request)
    {
        $day = $request->interval ? $request->interval:30;
        $interval = intval($request->input('interval',30));
        //contagem de pizzas
        $pizzacount = (Pizzas::all()->count());

        //contagem de pedidos
        $datelimit = date('Y-m-d H:i:s', strtotime('-'.$interval. 'days'));
        #dd($datelimit);
        $pedidoscount = (Pedido::all()->where('created_at','>=',$datelimit)->count());

        //contagem de valor adquirido até então
        $lucros = array();

        $lucrocount = (pedido::all()->where('created_at','>=',$datelimit));
        foreach($lucrocount as $lucro){
            array_push($lucros, $lucro->price);
        }
        $lucros = (array_sum($lucros));

        return view('action.dashboard',[
            'pizza' => $pizzacount,
            'pedidos' => $pedidoscount,
            'valor' => $lucros,
            'dateInterval' => $interval,
            'days' => $day
        ]);
    }
}
