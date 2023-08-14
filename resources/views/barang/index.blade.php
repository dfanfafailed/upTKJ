@extends('layout')

<title>Barang</title>

@section('konten')  
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Barang </h6>
                </div>
            <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Opsi</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($barang as $b)
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->namabarang }}</td>
                    <td>{{ $b->hargabarang }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->tanggal }}</td>
                    <td>
                        <img src="{{ asset('storage/foto/'.$b->foto) }}" width="20%">
                    </td>
                    <td>

                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapusBarang{{ $b->id }}">Hapus</button>
                            
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalUpdateBarang{{ $b->id }}">edit</button>
                    </td>
                </tr>
                {{-- hapus barang --}}
                    <div class="modal fade" id="modalHapusBarang{{ $b->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus barang ini? :
                            <span>{{ $b->namabarang }}</span>
                        </h4>
                        </div>
                        <div class="modal-footer">
                        <form action="{{ route('barang.destroy', $b->id ) }}" method="post">
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
    <div class="modal fade" id="modalUpdateBarang{{ $b->id }}" tabindex="-1" aria-labelledby="modalUpdateBarang" aria-hidden="true">
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

        <form action="{{route('barang.update', $b->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                    @method('put')
            <div class="form-group">
                <label for="">Nama Barang</label>
                    <input type="text" class="form-control"  name="namabarang" value="{{ $b->namabarang}}">
                </div>

            <div class="form-group">
                <label for="">Harga Barang</label>
                    <input type="text" class="form-control"  name="hargabarang" value="{{ $b->hargabarang}}">
                </div>

            <div class="form-group">
                <label for="">Stok Barang</label>
                    <input type="text" class="form-control"  name="stok" value="{{ $b->stok}}">
            </div>

            <div class="form-group">
                <label for="">Tanggal</label>
                    <input type="date" class="form-control"  name="tanggal" value="{{ $b->tanggal}}">
            </div>

            <div class="col-mb-3">
                <label for="foto">Edit Foto</label>
                @if ($b->foto)
                <img src="{{ asset('storage/foto/'.$b->foto) }}" class="img-thumbnail" style="width: 50%">
                @endif
                <input type="file" class="form-control" accept="image/*" name="foto" id="foto" >
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
        <!-- End Modal UPDATE Barang-->
                        
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ContohModal">
        Tambah Barang Masuk
    </button>

    <!--Modal Awal-->
    <div class="modal fade" id="ContohModal" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mdal-title">Masukan Barang </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                

        <div class="modal-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="from-group mb-3">                                
                    <label>Nama Barang</label>
                    <input type="text"  name="namabarang"  class="form-control" placeholder="Masukan Nama Barang" required>
                </div>
                   
                <div class="row">
                    <div class="col-md-3">
                        <div class="from-control">
                            <label>Harga Barang </label>
                        <input type="number"  name="hargabarang"  class="form-control" placeholder="Harga Barang" >
                    </div>
                </div>
                    
                <div class="col-md-3">
                    <label>stok</label>
                        <input type="number"  name="stok"  class="form-control" placeholder="stok">
                    </div>

                <div class="col-md-3">
                    <label>Tanggal Input</label>
                        <input type="date"  name="tanggal"  class="form-control">
                </div>

                
                <div class="col-mb-3">
                    <label for="foto">Tambahkan Foto</label>
                        <input type="file"  name="foto" id="foto" class="form-control" accept="image/*">
                </div>
                

            </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="simpan">SUBMIT</button>
                                <button type="but" class="btn btn-danger" data-dismiss="modal">CLOSE</button>    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>



@include('footer/bawah')
</div>
@endsection