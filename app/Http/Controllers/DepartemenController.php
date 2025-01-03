<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen; // import model deprtemen

class DepartemenController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Departemen::all();
            return response()->json($data);
        }

        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required',
            'alamat' => 'required',

        ]);

        Departemen::create($validated);

        return response()->json(['success' => 'Data departemen berhasil disimpan!']);
    }

    public function edit($id)
    {
        $departemens = Departemen::findOrFail($id);
        return response()->json($departemens);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_departemen' => 'required',
            'alamat' => 'required',
        ]);

        $departemens = Departemen::findOrFail($id);

        $departemens->update([
            'nama_departemen' => $request->input('nama_departemen'),
            'alamat' => $request->input('alamat'),

        ]);

        return response()->json(['success' => 'Data departemen berhasil diperbarui!', 'departemen' => $departemens]);
    }

    public function destroy($id)
    {
        $departemens = Departemen::findOrFail($id);
        $departemens->delete();

        return response()->json(['success' => 'Data departemen berhasil dihapus!']);
    }
}
