@extends('layout')
@section('konten')

{{-- <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card">
                <div class="card-header">Table Transaksi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Id Barang</th>
                                    <th class="text-center">Jenis Barang</th>
                                    <th class="text-center">Jumlah Transaksi</th>
                                    <th class="text-center"> Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $t)
                                    <tr>
                                        <td>{{ $t->getNamaBarang->namabarang }}</td>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->jumlahbarang }}</td>
                                        <td>{{ $t->total }}</td>
                                        <td>
                                            {{-- <a href="{{ URL::route('transaksi.edit',$t->id) }}"><i class="fas fa-edit"></i></a> 
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapusBarang{{ $t->id }}">Hapus</button>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalHapusBarang{{ $t->id }}">Edit</button>
                                            {{-- <a href="{{ url('transaksi/destroy/'.$t->id) }}"><i class="fas fa-trash-alt"></i></a> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--input transaksi-->
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#TranModal">
                            Tambah Barang Masuk
                        </button>
                    
                        <!--Modal Awal-->
                        <div class="modal fade" id="TranModal" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="mdal-title">Masukan Barang </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                    
                            <div class="modal-body">
                                <form action="{{ route('barang.store') }}" method="POST">

                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi </h6>
                </div>
            <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id Transaksi</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Jumlah Barang</th>
                <th>Total</th>
                <th>Opsi</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($transaksi as $t)
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->Barang->namabarang }}</td>
                    <td>{{ $t->barang_id }}</td>
                    <td>{{ $t->jumlahbarang }}</td>
                    <td>{{ $t->Barang->hargabarang * $t->jumlahbarang }}</td>
                    <td>

                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapusTrk{{ $t->barang_id }}">Hapus</button>
                            
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalUpdateTrk{{ $t->barang_id }}">edit</button>
                    </td>
                </tr>
                {{-- hapus barang --}}
                    <div class="modal fade" id="modalHapusTrk{{ $t->barang_id }}" tabindex="-1" aria-labelledby="modalHapusTrk" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus barang ini? :
                            <span>{{ $t->Barang->namabarang }}</span>
                        </h4>
                        </div>
                        <div class="modal-footer">
                        <form action="{{ route('transaksi.destroy', $t->id ) }}" method="post">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-primary">Hapus Barang!</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                {{-- tutupan hapus barang --}}
        

    {{-- modal edit barang --}}  
    <div class="modal fade" id="modalUpdateTrk{{ $t->barang_id }}" tabindex="-1" aria-labelledby="modalUpdateTrk" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <div class="modal-body">
    <!--FORM UPDATE BARANG-->

        <form action="{{route('transaksi.update', $t->id) }}" method="post">
                @csrf
                    @method('put')

            <div class="form-group">
                <label for="">Nama Barang</label>
                    <input type="text" class="form-control"  name="namabarang" value="{{ $t->Barang->namabarang}}">
                </div>

            <div class="form-group">
                <label for="">Kode Barang</label>
                    <input type="text" class="form-control"  name="barang_id" value="{{ $t->barang_id}}">
            </div>

            <div class="form-group">
                <label for="">Jumlah Barang</label>
                    <input type="text" class="form-control"  name="jml_brg" value="{{ $t->jumlahbarang}}">
            </div>

                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Perbarui Data</button>
                
        </form>
        <!--END FORM UPDATE BARANG-->
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </tbody>
</table>

<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#TrkModal">
    Tambah Transaksi
</button>

<!--Modal Awal-->
<div class="modal fade" id="TrkModal" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mdal-title">Masukan Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            

    <div class="modal-body">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="from-group mb-3">                                
                <label>Masukan Nama Barang</label>
                <select name="barang_id" class="form-control" id="namabrg">
                    <option class="form-control">--Lainya--</option>
                    @foreach ($barang as $brg)
                        <option value="{{ $brg->id }}">{{ $brg->namabarang }}</option>
                    @endforeach
                </select>
            </div>
                
            <div class="col-md-3">
                <label>Jumlah Barang</label>
                    <input type="number"  name="jumlahbarang"  class="form-control" placeholder="Jumlah Barang">
                </div>

            {{-- <div class="col-md-3">
                <label>Total Barang</label>
                    <input type="number"  name="jumlahbarang"  class="form-control" placeholder="Jumlah Barang">
                </div> --}}

        </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="simpan">SUBMIT</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
</div>

@endsection