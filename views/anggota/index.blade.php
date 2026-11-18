<!DOCTYPE html>
<html>
<head>
    <title>Data Band Musik</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <h1>🎸 Data Band Musik</h1>

    <a href="{{ route('anggota.create') }}">+ Tambah Band</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Band</th>
                <th>Genre</th>
                <th>Asal</th>
                <th>Tahun Berdiri</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($anggota as $band)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if ($band->foto)
                            <img src="{{ asset('foto/' . $band->foto) }}"
                                 width="100"
                                 alt="{{ $band->nama_band }}">
                        @else
                            Tidak ada foto
                        @endif
                    </td>

                    <td>{{ $band->nama_band }}</td>
                    <td>{{ $band->genre }}</td>
                    <td>{{ $band->asal }}</td>
                    <td>{{ $band->tahun_berdiri }}</td>

                    <td>
                        <a href="{{ route('anggota.edit', $band->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('anggota.destroy', $band->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus band ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7">
                        Belum ada data band.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>