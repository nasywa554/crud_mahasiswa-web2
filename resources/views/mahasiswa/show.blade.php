@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">Detail Data Mahasiswa</h4>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3"><strong>NIM:</strong></div>
            <div class="col-md-9">{{ $mahasiswa->nim }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nama:</strong></div>
            <div class="col-md-9">{{ $mahasiswa->nama }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Jurusan:</strong></div>
            <div class="col-md-9">{{ $mahasiswa->jurusan }}</div> {{-- Menampilkan jurusan --}}
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Email:</strong></div>
            <div class="col-md-9">{{ $mahasiswa->email }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Status:</strong></div>
            <div class="col-md-9">
                @if ($mahasiswa->status == 'aktif')
                    <span class="badge bg-success">Aktif</span>
                @else
                    <span class="badge bg-danger">Tidak Aktif</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Dibuat Pada:</strong></div>
            <div class="col-md-9">{{ $mahasiswa->created_at->format('d M Y H:i:s') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Diperbarui Pada:</strong></div>
            <div class="col-md-9">{{ $mahasiswa->updated_at->format('d M Y H:i:s') }}</div>
        </div>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection