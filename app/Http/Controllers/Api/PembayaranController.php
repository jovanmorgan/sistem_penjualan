<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penjualan;


class PembayaranController extends Controller
{
    // GET: Ambil semua pembayaran
    public function index()
    {
        $pembayaran = Pembayaran::with('penjualan')->get();
        return response()->json($pembayaran);
    }

    // POST: Buat pembayaran kredit baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'penjualan_id' => 'required|exists:penjualan,id',
            'jumlah_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date'
        ]);

        // Ambil data penjualan berdasarkan penjualan_id
        $penjualan = Penjualan::find($request->penjualan_id);
        $grand_total = $penjualan->grand_total;

        // Hitung total pembayaran yang sudah dilakukan untuk penjualan_id yang dipilih
        $total_bayar = Pembayaran::where('penjualan_id', $request->penjualan_id)->sum('jumlah_bayar');

        // Cek apakah total pembayaran baru + total yang sudah ada melebihi grand_total
        $new_total_bayar = $total_bayar + $request->jumlah_bayar;

        if ($new_total_bayar > $grand_total) {
            // Jika melebihi, munculkan error
            return response()->json([
                'message' => 'Nominal sudah melewati pembayaran yang diizinkan.'
            ], 400);
        }

        // Tentukan status pembayaran
        $status = ($new_total_bayar == $grand_total) ? 'lunas' : 'belum lunas';

        // Buat entri pembayaran baru
        $pembayaran = Pembayaran::create([
            'penjualan_id' => $request->penjualan_id,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'status' => $status
        ]);

        // Jika total pembayaran sudah mencapai grand_total, update status penjualan
        if ($new_total_bayar == $grand_total) {
            $penjualan->update(['status' => 'Sudah Lunas']);
        }

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => $pembayaran
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
