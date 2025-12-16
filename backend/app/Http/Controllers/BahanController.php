<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bahanMakanan;

class BahanController extends Controller
{
    public function index()
    {
        return bahanMakanan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
        ]);

        return bahanMakanan::create($request->all());
    }

    public function show($id)
    {
        return bahanMakanan::find($id);
    }

    public function update(Request $request, $id)
    {
        $bahan = bahanMakanan::findOrFail($id);
        $bahan->update($request->all());
        return $bahan;
    }

    public function destroy($id)
    {
        bahanMakanan::findOrFail($id)->delete();
        return response()->json('pesan berhasil', 200);
    }
}
