<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;

class ApiKeluargaController extends Controller
{
    public function getFamilyData()
    {
        // Ambil semua data keluarga dari database
        $allFamilyData = Keluarga::all();

        // Inisialisasi data keluarga sebagai array
        $familyData = [];

        // Loop melalui setiap data keluarga dan susun dalam format hierarkis
        foreach ($allFamilyData as $person) {
            // Jika tidak ada parent_id, itu adalah root (induk)
            if ($person->parent_id === null) {
                $familyData[] = [
                    'id' => $person->id,
                    'name' => $person->name,
                    'gender' => $person->gender,
                    'relationship' => 'Root',
                    'children' => $this->getChildren($allFamilyData, $person->id),
                ];
            }
        }

        // Kirim sebagai respons JSON
        return response()->json($familyData);
    }

    // Fungsi rekursif untuk mendapatkan anak-anak seseorang
    private function getChildren($allFamilyData, $parentId)
    {
        $children = [];

        foreach ($allFamilyData as $person) {
            if ($person->parent_id === $parentId) {
                $children[] = [
                    'id' => $person->id,
                    'name' => $person->name,
                    'gender' => $person->gender,
                    'relationship' => $person->relationship,
                    'children' => $this->getChildren($allFamilyData, $person->id),
                ];
            }
        }

        return $children;
    }
}
