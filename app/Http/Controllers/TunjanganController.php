<?php

namespace App\Http\Controllers;

use App\Models\Tunjangan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Tunjangan::all();
            return response()->json($data);
        }

        $tunjangans = Tunjangan::all();
        return view('tunjangan.index', compact('tunjangans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required',
            'jenis_tunjangan' => 'required',
            'jumlah_tunjangan' => 'required',

        ]);

        Tunjangan::create($validated);

        return response()->json(['success' => 'Data tunjangan berhasil disimpan!']);
    }

    public function edit($id)
    {
        $tunjangans = Tunjangan::findOrFail($id);
        return response()->json($tunjangans);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'jenis_tunjangan' => 'required',
            'jumlah_tunjangan' => 'required',
        ]);

        $tunjangans = Tunjangan::findOrFail($id);

        $tunjangans->update([
            'karyawan_id' => $request->input('karyawan_id'),
            'jenis_tunjangan' => $request->input('jenis_tunjangan'),
            'jumlah_tunjangan' => $request->input('jumlah_tunjangan'),
        ]);

        return response()->json(['success' => 'Data tunjangan berhasil diperbarui!', 'tunjangan' => $tunjangans]);
    }

    public function destroy($id)
    {
        $tunjangans = Tunjangan::findOrFail($id);
        $tunjangans->delete();

        return response()->json(['success' => 'Data tunjangan berhasil dihapus!']);
    }
}
