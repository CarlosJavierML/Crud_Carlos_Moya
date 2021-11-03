<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eps;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eps = Eps::all();
        return view('eps.index')->with('eps', $eps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eps = new Eps();

        $eps->codigo = $request->get('codigo');
        $eps->nombre = $request->get('nombre');

        $eps->save();

        return redirect('/eps');
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
        $eps = Eps::find($id);
        return view('eps.edit')->with('eps',$eps);
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
        $eps = Eps::find($id);

        $eps->nombre = $request->get('nombre');
        $eps->cedula = $request->get('cedula');
        $eps->id_eps = $request->get('id_eps');

        $eps->save();

        return redirect('/eps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eps = Eps::find($id);
        $eps->delete();

        return redirect('/eps');
    }
}
