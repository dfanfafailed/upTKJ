@extends('layouts.main')

@section('contents')

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card" style="width: 25rem;">
        <div class="card-header text-center">
          silahkan registrasi
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-body">
            <form method="post" action="/registrasi">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">nama</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                  @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                  @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection