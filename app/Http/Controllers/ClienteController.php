<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Users::paginate(10);
        return view('action.clientes',[
            'clientes' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action.createCliente');
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
            'phone'
        ]);
        $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'integer']
         ]);


        if($validator->fails()){
            return redirect()->route('clientes.create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $cliente = new Users;
        $cliente->name = $data['name'];
        $cliente->address = $data['address'];
        $cliente->phone = $data['phone'];
        $cliente->save();

        return redirect()->route('clientes.index');
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
        $data = Users::find($id);

        if($data){
            return view('action.clienteEdit',[
                'cliente' => $data
            ]);
        }
        return redirect()->route('clientes.index');
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
        $clientes = Users::find($id);
        if($clientes){
            $data = $request->only([
                'name',
                'address',
                'phone'
            ]);
            $validator = Validator::make($data,[
                'name' => ['required', 'string', 'max:100'],
                'address' => ['required', 'string'],
                'phone' => ['required', 'integer']

            ]);
            if($validator->fails()){
                return redirect()->route('clientes.create')
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        $clientes->name = $data['name'];
        $clientes->address = $data['address'];
        $clientes->phone = $data['phone'];
        $clientes->save();

        return redirect()->route('clientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Users::find($id);
        $data->delete();

        return redirect()->route('clientes.index');
    }
}
