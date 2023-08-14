@extends('layout')

    <title>Jasa</title>

@section('konten')
    
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jasa </h6>
                </div>
            <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="">
        <thead>
            <tr>
                <th>Kode Jasa</th>
                <th>Nama Jasa</th>
                <th>Harga Jasa</th>
                <th>Tanggal</th>
                <th>Opsi</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($jasa as $j)
                    <td>{{ $j->id }}</td>
                    <td>{{ $j->namajasa }}</td>
                    <td>{{ $j->hargajasa }}</td>
                    <td>{{ $j->tanggal }}</td>
                    <td>                            
                            
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapusJasa{{ $j->id }}">Hapus</button>
                            
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalUpdateJasa{{ $j->id }}"> edit</button>
                    
                    </td>
                </tr>
        {{-- Hapus Data jasa--}}
        <div class="modal fade" id="modalHapusJasa{{ $j->id }}" tabindex="-1" aria-labelledby="modalHapusJasa" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus barang ini? :
                            <span>{{ $j->namajasa }}</span>
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('jasa.destroy', $j->id ) }}" method="post">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-primary" >Hapus Jasa!</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- tutupan hapus data jasa --}}

        {{-- awalan edit data jasa --}}
        <div class="modal fade" id="modalUpdateJasa{{ $j->id }}" tabindex="-1" aria-labelledby="modalUpdateJasa" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Jasa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <div class="modal-body">
        <!--FORM UPDATE BARANG-->
    
            <form action="{{route('jasa.update', $j->id) }}" method="post">
                    @csrf
                        @method('put')
                <div class="form-group">    
                    <label for="">Nama Jasa</label>
                        <input type="text" class="form-control"  name="namajasa" value="{{ $j->namajasa}}">
                    </div>
    
                <div class="form-group">
                    <label for="">Harga Jasa</label>
                        <input type="text" class="form-control"  name="hargajasa" value="{{ $j->hargajasa}}">
                    </div>

                <div class="form-group">
                    <label for="">Tanggal</label>
                        <input type="date" class="form-control"  name="tanggal" value="{{ $j->tanggal}}">
                </div>
    
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="save">Perbarui Data</button>
                    
            </form>
            <!--END FORM UPDATE BARANG-->
                    </div>
                </div>
            </div>
        </div>

                @endforeach           
        </tbody>
    </table>
                        

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ContohModal">
        Tambah Jasa Masuk
    </button>

    <!--Modal Awal-->
    <div class="modal fade" id="ContohModal" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mdal-title">Masukan Jasa </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                

        <div class="modal-body">
            <form action="{{ route('jasa.store') }}" method="POST">
                @csrf

                {{-- <div class="from-group mb-3">
                    <label>Kode Jasa</label>
                    <input type="number"  name="kodebarang"  class="form-control" readonly >
                </div> --}}

                <div class="from-group mb-3">                                
                    <label>Nama Jasa</label>
                    <input type="text"  name="namajasa"  class="form-control" placeholder="Masukan Nama Jasa" id="">
                </div>
                   
                <div class="row">
                    <div class="col-md-3">
                        <div class="from-control">
                            <label>Harga Jasa</label>
                        <input type="number"  name="hargajasa"  class="form-control" placeholder="Harga Jasa" id="">
                    </div>
                </div>

                <div class="col-md-3">
                    <label>Tanggal Input</label>
                        <input type="date"  name= "tanggal"  class="form-control" id="">
                </div>

            </div>

            <div class="modal-footer">
                &nbsp;
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="simpan">SUBMIT</button>
                    <button type="but" class="btn btn-danger" data-dismiss="modal">CLOSE</button>    
                                </div>
                            </form>
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