<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resepMakanan;

class ResepController extends Controller
{
       public function index()
        {
            return resepMakanan::with('kategoriMakanan')->get();
        }

        public function show($id)
        {
            return resepMakanan::with('kategoriMakanan')->findOrFail($id);
        }

        public function store(Request $request)
        {
           $request->validate([
               'nama_resep' => 'required|string|max:255',
               'id_kategori_makanan' => 'required|exists:kategori_makanans,id',
               'deskripsi' => 'required|string',
           ]); 
           
           $resep = resepMakanan::create($request->only('nama_resep', 'id_kategori_makanan', 'deskripsi'));

           foreach ($request->bahan as $bahan) {
               $resep->bahanMakanan()->attach($bahan['id'], ['jumlah' => $bahan['jumlah']]);
           }

           return $resep->load('bahanMakanan');
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nama_resep' => 'required|string|max:255',
                'id_kategori_makanan' => 'required|exists:kategori_makanans,id',
                'deskripsi' => 'required|string',
            ]);

            if ($request->has('bahan')) {
                $resep = resepMakanan::findOrFail($id);
                $resep->bahanMakanan()->detach();
                foreach ($request->bahan as $bahan) {
                    $resep->bahanMakanan()->attach($bahan['id'], ['jumlah' => $bahan['jumlah']]);
                }
            }

            $resep->update($request->only('nama_resep', 'id_kategori_makanan', 'deskripsi'));
            return $resep->load('bahanMakanan');
        }

        public function destroy($id)
        {
            $resep = resepMakanan::findOrFail($id)->delete;
            return response()->json('pesan berhasil', 200);
        }
}
