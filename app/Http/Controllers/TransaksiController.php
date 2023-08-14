<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $transaksi = Transaksi::all();

        return view('transaksi.barang', compact('transaksi', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.barang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Transaksi::create($request->except('_token'));

        $barang = Barang::find($request->barang_id);

        $barang->stok -= $request->jumlahbarang;

        $total=['$barang->jumlahbarang *= hargabarang'];

        $barang->save();
        // $this->updateBarang($request);

        return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
 
        $t = Transaksi::find($id);
        $t->Barang->namabarang = $request->input('namabarang');
        $t->barang_id = $request->input('barang_id');
        $t->jumlahbarang = $request->input('jml_brg');
        if ($t->save()) {
            return redirect('transaksi');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Transaksi::find($id);
        $t->delete();
        return redirect('transaksi');
    }

}