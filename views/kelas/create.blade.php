@extends('layouts.admin')

@section('title', 'Tambah Kelas')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Kelas</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
                            <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" placeholder="Contoh: X" required>
                            @error('kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" placeholder="Contoh: AKL 3 " required>
                            @error('jurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Wali Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="wali_kelas" class="form-control @error('wali_kelas') is-invalid @enderror" value="{{ old('wali_kelas') }}" placeholder="Contoh: Jaskia Ellysia M.Kom" required>
                        @error('wali_kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    

                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('kelas.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection