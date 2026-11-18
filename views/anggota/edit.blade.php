<!DOCTYPE html>
<html>
<head>
    <title>Edit Band</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <h1>✏️ Edit Band Musik</h1>

    <form action="{{ route('anggota.update', $anggota->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>Nama Band</label><br>
        <input type="text"
               name="nama_band"
               value="{{ $anggota->nama_band }}"
               required>

        <br><br>

        <label>Genre</label><br>
        <input type="text"
               name="genre"
               value="{{ $anggota->genre }}"
               required>

        <br><br>

        <label>Asal</label><br>
        <input type="text"
               name="asal"
               value="{{ $anggota->asal }}"
               required>

        <br><br>

        <label>Tahun Berdiri</label><br>
        <input type="number"
               name="tahun_berdiri"
               value="{{ $anggota->tahun_berdiri }}"
               required>

        <br><br>

        <label>Foto Band</label><br>

        @if ($anggota->foto)
            <img src="{{ asset('foto/' . $anggota->foto) }}"
                 width="120"
                 alt="{{ $anggota->nama_band }}">

            <br><br>
        @endif

        <input type="file" name="foto" accept="image/*">

        <br><br>

        <button type="submit">Update</button>

        <a href="{{ route('anggota.index') }}">
            Kembali
        </a>

    </form>

</body>
</html>