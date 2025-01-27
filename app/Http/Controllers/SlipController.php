<?php

namespace App\Http\Controllers;

use App\Models\Slip;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SlipController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Slip::all();
            return response()->json($data);
        }

        $slips = Slip::all();
        return view('slip.index', compact('slips'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required',
            'karyawan_id' => 'required',
            'departemen_id' => 'required',
            'gaji_id' => 'required',
            'tunjangan_id' => 'required',
            'total_pendapatan' => 'required',

        ]);

        Slip::create($validated);

        return response()->json(['success' => 'Data slip berhasil disimpan!']);
    }

    public function edit($id)
    {
        $slips = Slip::findOrFail($id);
        return response()->json($slips);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required',
            'karyawan_id' => 'required',
            'departemen_id' => 'required',
            'gaji_id' => 'required',
            'tunjangan_id' => 'required',
            'total_pendapatan' => 'required',
        ]);

        $slips = Slip::findOrFail($id);

        $slips->update([
            'bulan' => $request->input('bulan'),
            'karyawan_id' => $request->input('karyawan_id'),
            'departemen_id' => $request->input('departemen_id'),
            'gaji_id' => $request->input('gaji_id'),
            'tunjangan_id' => $request->input('tunjangan_id'),
            'total_pendapatan' => $request->input('total_pendapatan'),


        ]);

        return response()->json(['success' => 'Data slip berhasil diperbarui!', 'slip' => $slips]);
    }

    public function destroy($id)
    {
        $slips = Slip::findOrFail($id);
        $slips->delete();

        return response()->json(['success' => 'Data slip berhasil dihapus!']);
    }  

    public function exportPdf(Request $request)
    {
        $slips = Slip::all();
        $pdf = Pdf::loadView('pdf.slip', ['slips' => $slips]);
        $fileName = 'slip_' . Carbon::now()->timestamp . '.pdf';
        return $pdf->download($fileName);
    }
}
