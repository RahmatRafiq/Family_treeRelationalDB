<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles.css') }}"> <!-- File CSS Eksternal -->

    <title>Data Keluarga</title>

</head>

<body>
    </div>
    <h1>Data Keluarga</h1>
    <div class="btn-container">
        <a href="{{ route('keluarga.index') }}" class="btn">Keluarga Besar</a>
        <a href="{{ route('keluarga.anakBudi') }}" class="btn">Anak Budi</a>
        <a href="{{ route('keluarga.cucuBudi') }}" class="btn">Cucu Budi</a>
        <a href="{{ route('keluarga.cucuPerempuanBudi') }}" class="btn">Cucu Perempuan Budi</a>
        <a href="{{ route('keluarga.bibiFarah') }}" class="btn">Bibi Farah</a>
        <a href="{{ route('keluarga.sepupuLakiLakiHani') }}" class="btn">Sepupu Laki-Laki Hani</a>
        @if (isset($keluarga))
            <h2>Keluarga Besar</h2>
            <table id="keluargaTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Anak Dari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="{{ route('keluarga.create') }}" class="btn btn-primary">Tambah Keluarga</a>
                    @foreach ($keluarga as $keluargaBudi)
                        <tr>
                            <td>{{ $keluargaBudi->name }}</td>
                            <td>{{ $keluargaBudi->getGenderLabel() }}</td>
                            <td>{{ $keluargaBudi->parent ? $keluargaBudi->parent->name : 'Tidak Ada' }}</td>
                            <td>
                                <a href="{{ route('keluarga.edit', $keluargaBudi->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route('keluarga.destroy', $keluargaBudi->id) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if (isset($anakBudi))
            <h2>Anak Budi</h2>
            <table id="keluargaTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anakBudi as $anak)
                        <tr>
                            <td>{{ $anak->name }}</td>
                            <td>{{ $anak->getGenderLabel() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Tampilkan data cucu Budi -->
        @if (isset($cucuBudi))
            <h2>Cucu Budi</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cucuBudi as $cucu)
                        <tr>
                            <td>{{ $cucu->name }}</td>
                            <td>{{ $cucu->getGenderLabel() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Tampilkan data cucu perempuan Budi -->
        @if (isset($cucuPerempuan))
            <h2>Cucu Perempuan Budi</h2>
            <table>
                <div>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cucuPerempuan as $cucuPerempuan)
                            <tr>
                                <td>{{ $cucuPerempuan->name }}</td>
                                <td>{{ $cucuPerempuan->getGenderLabel() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        @endif

        <!-- Tampilkan data bibi Farah -->
        @if (isset($bibiFarah))
            <h2>Bibi Farah</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bibiFarah as $bibi)
                        <tr>
                            <td>{{ $bibi->name }}</td>
                            <td>{{ $bibi->getGenderLabel() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Tampilkan data sepupu laki-laki Hani -->
        @if (isset($sepupuLakiLakiHani))
            <h2>Sepupu Laki-laki Hani</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sepupuLakiLakiHani as $sepupu)
                        <tr>
                            <td>{{ $sepupu->name }}</td>
                            <td>{{ $sepupu->getGenderLabel() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
