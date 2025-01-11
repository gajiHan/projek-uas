<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class GajiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Gaji::all();
            return response()->json($data);
        }

        $gajis = Gaji::all();
        return view('gaji.index', compact('gajis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'gaji_pokok' => 'required',
            'potongan_id' => 'required',
            'lembur_id' => 'required',
            'total_gaji' => 'required',

        ]);

        Gaji::create($validated);

        return response()->json(['success' => 'Data gaji berhasil disimpan!']);
    }

    public function edit($id)
    {
        $gajis = Gaji::findOrFail($id);
        return response()->json($gajis);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'gaji_pokok' => 'required',
            'potongan_id' => 'required',
            'lembur_id' => 'required',
            'total_gaji' => 'required',
        ]);

        $gajis = Gaji::findOrFail($id);

        $gajis->update([
            'karyawan_id' => $request->input('karyawan_id'),
            'bulan' => $request->input('bulan'),
            'tahun' => $request->input('tahun'),
            'gaji_pokok' => $request->input('gaji_pokok'),
            'potongan_id' => $request->input('potongan_id'),
            'lembur_id' => $request->input('lembur_id'),
            'total_gaji' => $request->input('total_gaji'),

        
        ]);

        return response()->json(['success' => 'Data gaji berhasil diperbarui!', 'gaji' => $gajis]);
    }

    public function destroy($id)
    {
        $gajis = Gaji::findOrFail($id);
        $gajis->delete();

        return response()->json(['success' => 'Data gaji berhasil dihapus!']);
    }  

    public function exportPdf(Request $request)
    {
        $gajis = Gaji::all();
        $pdf = Pdf::loadView('pdf.gaji', ['gajis' => $gajis]);
        $fileName = 'gaji_' . Carbon::now()->timestamp . '.pdf';
        return $pdf->download($fileName);
    }
}
