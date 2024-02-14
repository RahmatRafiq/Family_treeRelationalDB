<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <title>Edit Keluarga</title>
</head>

<body>

    <h1>Edit Keluarga</h1>

    <form action="{{ route('keluarga.update', $keluarga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ $keluarga->name }}" required>
        </div>

        <div>
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" required>
                <option value="L" {{ $keluarga->gender === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $keluarga->gender === 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label for="parent_id">Anak Dari</label>
            <select id="parent_id" name="parent_id">
                <option value="">Tidak Ada</option>
                @foreach ($semuaKeluarga as $keluargaItem)
                    <option value="{{ $keluargaItem->id }}"
                        {{ $keluarga->parent_id === $keluargaItem->id ? 'selected' : '' }}>
                        {{ $keluargaItem->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit">Simpan Perubahan</button>
    </form>

</body>

</html>
