@extends('layouts.admin')

@section('title', 'Tambah Data Siswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-person-plus me-2"></i>Tambah Data Siswa</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    
                    

                        <!-- Nama siswa -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama') }}" 
                                   placeholder="Contoh: Sebastian Jaden Xavier" 
                                   required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    

                    <!-- kelas -->
                    <div class="col-md-6 mb-3">
    <label class="form-label fw-semibold">
        Kelas <span class="text-danger">*</span>
    </label>

    <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror" required>
        <option value="">-- Pilih Kelas --</option>

        @foreach ($kelas as $item)
            <option value="{{ $item->id }}"
                {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                {{ $item->kelas }} - {{ $item->jurusan }}
            </option>
        @endforeach
    </select>

    @error('kelas_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                        
                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="alamat" 
                                  class="form-control @error('alamat') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Masukkan alamat tempat tinggal..." 
                                  required>{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('guru.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection