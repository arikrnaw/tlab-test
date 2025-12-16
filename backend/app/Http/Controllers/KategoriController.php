<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriMakanan;

class KategoriController extends Controller
{
    public function index()
    {
        return kategoriMakanan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
         return kategoriMakanan::create($request->all());

    }

    public function show($id)
    {
        return kategoriMakanan::findorFail($id);
    }

    public function update(Request $request, $id)
    {
        $kategori = kategoriMakanan::findOrFail($id);
        $kategori->update($request->all());
        return $kategori;
    }

    public function destroy($id)
    {
        kategoriMakanan::findOrFail($id)->delete();
        return response()->json('pesan berhasil', 200);
    }
}

