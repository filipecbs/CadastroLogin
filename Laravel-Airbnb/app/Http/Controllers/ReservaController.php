<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ( $user ) {

            $reservas = $user->minhasReservas();

            return response()->json( [
                "message" => "Busca concluída!",
                "data" => $reservas
            ], 200 );

        } else {

            return response()->json( [
                "message" => "Não autorizado!",
                "data" => null
            ], 401 );

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        if ( $user ) {
        
            $reserva = new Reserva();
            
            $reserva->name = $request->name;
            $reserva->data = $request->data;

            $reserva->save();

            return response()->json( [
            	"message" => "Reserva criada com sucesso!",
            	"data" => $reserva
            ], 200 );

        } else {

            return response()->json( [
                "message" => "Não autorizado!",
                "data" => null
            ], 401 );

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = Auth::user();

        if ( $user ) {

            $reserva = Reserva::find($id);

            return response()->json( [
                "message" => "Busca concluída!",
                "data" => $reserva
            ], 200 );

        } else {

            return response()->json( [
                "message" => "Não autorizado!",
                "data" => null
            ], 401 );

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if ( $user ) {
        
            $reserva = Reserva::find($id);
            
            $reserva->name = $request->name;
            $reserva->data = $request->data;

            $reserva->save();

            return response()->json( [
                "message" => "Reserva editada com sucesso!",
                "data" => $reserva
            ], 200 );

        } else {

            return response()->json( [
                "message" => "Não autorizado!",
                "data" => null
            ], 401 );

        }
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
        $user = Auth::user();

        if ( $user ) {

            $reserva = Reserva::find($id);
            $reserva->destroy();

            return response()->json( [
                "message" => "Reserva deletada com sucesso!",
                "data" => $reserva
            ], 200 );

        } else {

            return response()->json( [
                "message" => "Não autorizado!",
                "data" => null
            ], 401 );

        }
    }
}
