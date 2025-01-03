<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Karyawan::all();
            return response()->json($data);
        }

        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'departemen_id' => 'required',
            'jabatan' => 'required',
        ]);

        Karyawan::create($validated);

        return response()->json(['success' => 'Data karyawan berhasil disimpan!']);
    }

    public function edit($id)
    {
        $karyawans = Karyawan::findOrFail($id);
        return response()->json($karyawans);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'departemen_id' => 'required',
            'jabatan' => 'required',
        ]);

        $karyawans = Karyawan::findOrFail($id);

        $karyawans->update([
            'nama' => $request->input('nama'),
            'no_telpon' => $request->input('no_telpon'),
            'alamat' => $request->input('alamat'),
            'departemen_id' => $request->input('departemen_id'),
            'jabatan' => $request->input('jabatan'),
        ]);

        return response()->json(['success' => 'Data karyawan berhasil diperbarui!', 'karyawan' => $karyawans]);
    }

    public function destroy($id)
    {
        $karyawans = Karyawan::findOrFail($id);
        $karyawans->delete();

        return response()->json(['success' => 'Data karyawan berhasil dihapus!']);
    }
}
