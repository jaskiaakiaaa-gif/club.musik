<!DOCTYPE html>
<html>
<head>
    <title>Tambah Band</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <h1>🎸 Tambah Band Musik</h1>

    <form action="{{ route('anggota.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <label>Nama Band</label><br>
        <input type="text" name="nama_band" required>

        <br><br>

        <label>Genre</label><br>
        <input type="text" name="genre" required>

        <br><br>

        <label>Asal</label><br>
        <input type="text" name="asal" required>

        <br><br>

        <label>Tahun Berdiri</label><br>
        <input type="number" name="tahun_berdiri" required>

        <br><br>

        <label>Foto Band</label><br>
        <input type="file" name="foto" accept="image/*">

        <br><br>

        <button type="submit">Simpan</button>

        <a href="{{ route('anggota.index') }}">
            Kembali
        </a>

    </form>

</body>
</html>