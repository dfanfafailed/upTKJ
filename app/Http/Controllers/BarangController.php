<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = new Barang();
        $b->namabarang = $request->input('namabarang');
        $b->hargabarang = $request->input('hargabarang');
        $b->stok = $request->input('stok');
        $b->tanggal = $request->input('tanggal');
        $b->foto = $request->input('foto');

        $file = $request->file('foto');
        $filename = uniqid().'.'. $file->getClientOriginalExtension();
        $file->storeAs('/public/foto',$filename);
        $b['foto']= $filename;


        if($b->save()){
            return redirect()->route('barang.index');
        } else {
            return redirect()->back();
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idbarang)
    {
        $b = Barang::find($idbarang);
        $b->namabarang = $request->input('namabarang');
        $b->hargabarang = $request->input('hargabarang');
        $b->stok = $request->input('stok');
        $b->tanggal = $request->input('tanggal');
        $b->foto = $request->input('foto');

        $file = $request->file('foto');
        $filename = uniqid().'.'. $file->getClientOriginalExtension();
        $file->storeAs('/public/foto',$filename);
        $b['foto']= $filename;

        if ($b->save()) {
            return redirect()->route('barang.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($idbarang)
    {
        {
            $b = Barang::find($idbarang);
            $b->delete();
            return redirect()->route('barang.index');
        }    
          
    }
}
