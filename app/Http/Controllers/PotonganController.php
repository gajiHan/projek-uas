<?php

namespace App\Http\Controllers;

use App\Models\Potongan;
use Illuminate\Http\Request;

class PotonganController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Potongan::all();
            return response()->json($data);
        }

        $potongans = Potongan::all();
        return view('potongan.index', compact('potongans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required',
            'jenis_potongan' => 'required',
            'jumlah_potongan' => 'required',
            
        ]);

        Potongan::create($validated);

        return response()->json(['success' => 'Data potongan berhasil disimpan!']);
    }

    public function edit($id)
    {
        $potongans = Potongan::findOrFail($id);
        return response()->json($potongans);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'jenis_potongan' => 'required',
            'jumlah_potongan' => 'required',
        ]);

        $potongans = Potongan::findOrFail($id);

        $potongans->update([
            'karyawan_id' => $request->input('karyawan_id'),
            'jenis_potongan' => $request->input('jenis_potongan'),
            'jumlah_potongan' => $request->input('jumlah_potongan'),
        ]);

        return response()->json(['success' => 'Data potongan berhasil diperbarui!', 'potongan' => $potongans]);
    }

    public function destroy($id)
    {
        $potongans = Potongan::findOrFail($id);
        $potongans->delete();

        return response()->json(['success' => 'Data potongan berhasil dihapus!']);
    }
}
