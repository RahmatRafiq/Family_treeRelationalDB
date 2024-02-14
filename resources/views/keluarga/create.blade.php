<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <title>Tambah Keluarga</title>
</head>

<body>

    <h1>Tambah Keluarga</h1>

    <form action="{{ route('keluarga.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div>
            <label for="parent_id">Anak Dari</label>
            <select id="parent_id" name="parent_id">
                <option value="">Tidak Ada</option>
                @foreach ($semuaKeluarga as $keluargaItem)
                    <option value="{{ $keluargaItem->id }}">{{ $keluargaItem->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="relationship">Hubungan Keluarga</label>
            <input type="text" id="relationship" name="relationship" required>
        </div>
        <button type="submit">Tambah Keluarga</button>
    </form>

</body>

</html>
