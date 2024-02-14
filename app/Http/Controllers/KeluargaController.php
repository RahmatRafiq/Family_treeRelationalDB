<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{

    public function index()
    {
        $keluarga = Keluarga::with('parent')->get();
        return view('keluarga.index', compact('keluarga'));
    }

    public function anakBudi()
    {
        $anakBudi = Keluarga::where('relationship', 'Anak')->where('parent_id', '1')->get();
        return view('keluarga.index', compact('anakBudi'));
    }

    public function cucuBudi()
    {
        $cucuBudi = Keluarga::where('relationship', 'Cucu')->get();
        return view('keluarga.index', compact('cucuBudi'));
    }

    public function cucuPerempuanBudi()
    {
        $cucuPerempuan = Keluarga::where('relationship', 'cucu')->where('gender', 'P')->get();
        return view('keluarga.index', compact('cucuPerempuan'));
    }

    public function bibiFarah()
    {
        $bibiFarah = Keluarga::where('relationship', 'Anak')->where('gender', 'P')->get();
        return view('keluarga.index', compact('bibiFarah'));
    }

    public function sepupuLakiLakiHani()
    {
        $sepupuLakiLakiHani = Keluarga::where('relationship', 'Cucu')->where('gender', 'L')->get();
        return view('keluarga.index', compact('sepupuLakiLakiHani'));
    }

    // CRUD section

    public function create()
    {
        $semuaKeluarga = Keluarga::with('parent')->get();

        return view('keluarga.create', compact('semuaKeluarga'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:L,P',
            'parent_id' => 'nullable|exists:table_keluarga,id',
            'relationship' => 'required',
        ]);

        Keluarga::create($data);
        return redirect()->route('keluarga.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Keluarga $keluarga)
    {
        $semuaKeluarga = Keluarga::with('parent')->get();
        return view('keluarga.edit', compact('keluarga', 'semuaKeluarga'));
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $data = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:L,P',
            'parent_id' => 'nullable|exists:table_keluarga,id',
            'relationship' => 'nullable',
        ]);

        $keluarga->update($data);
        return redirect()->route('keluarga.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();

        return redirect()->route('keluarga.index')->with('success', 'Data berhasil dihapus.');
    }
}
