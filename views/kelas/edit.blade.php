@extends('layouts.admin')

@section('title', 'Edit Kelas')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Kelas</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
                            <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas', $kelas->kelas) }}" required>
                            @error('kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" class="form-control @error(jurusan') is-invalid @enderror" value="{{ old('jurusan', $kelas->jurusan) }}" required>
                            @error('jurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Wali Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="wali_kelas" class="form-control @error('wali_kelas') is-invalid @enderror" value="{{ old('wali_kelas', $kelas->wali_kelas) }}" required>
                        @error('wali_kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Siswa</label>
                        <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                            <option value="">-- Pilih Guru (Opsional) --</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id', $mapel->guru_id) == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_guru }} (NIP: {{ $guru->nip }})
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('kelas.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning text-white px-4"><i class="bi bi-save me-1"></i> Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection