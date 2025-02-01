<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketingController extends Controller
{
    public function getKomisi()
    {
        $penjualan = DB::table('penjualan')
            ->join('marketing', 'penjualan.marketing_id', '=', 'marketing.id')
            ->select(
                'marketing.name as marketing',
                DB::raw("DATE_FORMAT(date, '%Y-%m') as bulan"),
                DB::raw("SUM(total_balance) as omzet")
            )
            ->groupBy('marketing.name', 'bulan')
            ->orderBy('bulan', 'asc')  // Mengurutkan berdasarkan bulan secara ascending
            ->orderBy('marketing.name', 'asc')  // Mengurutkan berdasarkan nama marketing secara alfabetik
            ->get();

        $hasil = $penjualan->map(function ($item) {
            $komisi_persen = 0;
            $omzet = $item->omzet;

            if ($omzet >= 500000000) {
                $komisi_persen = 10;
            } elseif ($omzet >= 200000000) {
                $komisi_persen = 5;
            } elseif ($omzet >= 100000000) {
                $komisi_persen = 2.5;
            }

            $komisi_nominal = ($komisi_persen / 100) * $omzet;

            return [
                'marketing' => $item->marketing,
                'bulan' => $item->bulan,
                'omzet' => $omzet,
                'komisi_persen' => $komisi_persen,
                'komisi_nominal' => $komisi_nominal
            ];
        });

        return response()->json($hasil);
    }
}
