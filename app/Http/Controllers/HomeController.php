<?php

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
