<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Lembur::all();
            return response()->json($data);
        }

        $lemburs = Lembur::all();
        return view('lembur.index', compact('lemburs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required',
            'tanggal_lembur' => 'required',
            'jumlah_jam_lembur' => 'required',
            'upah_lembur_perjam' => 'required',
            'total_lembur' => 'required',
            'keterangan' => 'required',
        ]);

        Lembur::create($validated);

        return response()->json(['success' => 'Data lembur berhasil disimpan!']);
    }

    public function edit($id)
    {
        $lemburs = Lembur::findOrFail($id);
        return response()->json($lemburs);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal_lembur' => 'required',
            'jumlah_jam_lembur' => 'required',
            'upah_lembur_perjam' => 'required',
            'total_lembur' => 'required',
            'keterangan' => 'required',
        ]);

        $lemburs = Lembur::findOrFail($id);

        $lemburs->update([
            'karyawan_id' => $request->input('karyawan_id'),
            'tanggal_lembur' => $request->input('tanggal_lembur'),
            'jumlah_jam_lembur' => $request->input('jumlah_jam_lembur'),
            'upah_lembur_perjam' => $request->input('upah_lembur_perjam'),
            'total_lembur' => $request->input('total_lembur'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return response()->json(['success' => 'Data lembur berhasil diperbarui!', 'lembur' => $lemburs]);
    }

    public function destroy($id)
    {
        $lemburs = Lembur::findOrFail($id);
        $lemburs->delete();

        return response()->json(['success' => 'Data lembur berhasil dihapus!']);
    }
}
