<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa = Jasa::all();

        return view('jasa.index', compact('jasa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $j = new Jasa();
        $j->namajasa = $request->input('namajasa');
        $j->hargajasa = $request->input('hargajasa');
        $j->tanggal = $request->input('tanggal');
        if($j->save()){
            return redirect()->route('jasa.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $idjasa)
    {
        $jas = Jasa::find($idjasa);
        return view('jasa.index', compact('jasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idjasa)
    {
        $j = Jasa::find($idjasa);
        $j->namajasa = $request->input('namajasa');
        $j->hargajasa = $request->input('hargajasa');
        $j->tanggal = $request->input('tanggal');
        if ($j->save()) {
            return redirect()->route('jasa.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idjasa)
    {
        {
            $j = Jasa::find($idjasa);
            $j->delete();
            return redirect()->route('jasa.index');
          }
    }
}
