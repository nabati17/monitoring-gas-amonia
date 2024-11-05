<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GasLevel;
use Carbon\Carbon;

class AnalisisController extends Controller
{
    public function index()
    {
        // Ambil data harian rata-rata selama seminggu terakhir
        $dailyData = GasLevel::selectRaw('DAYOFWEEK(created_at) as day, AVG(gas_level) as average_level')
                             ->where('created_at', '>=', Carbon::now()->subWeek())
                             ->groupBy('day')
                             ->orderBy('day', 'ASC')
                             ->get()
                             ->keyBy('day');
                             
        // Menyusun data ke dalam array agar sesuai dengan hari dalam seminggu
        $dailyAverages = [];
        for ($i = 1; $i <= 7; $i++) {
            $dailyAverages[] = isset($dailyData[$i]) ? $dailyData[$i]->average_level : 0;
        }

        // Ambil data bulanan rata-rata untuk setiap bulan di tahun ini
        $monthlyData = GasLevel::selectRaw('MONTH(created_at) as month, AVG(gas_level) as average_level')
                               ->whereYear('created_at', Carbon::now()->year)
                               ->groupBy('month')
                               ->orderBy('month', 'ASC')
                               ->get()
                               ->keyBy('month');
                               
        // Menyusun data bulanan ke dalam array agar sesuai dengan urutan bulan
        $monthlyAverages = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyAverages[] = isset($monthlyData[$i]) ? $monthlyData[$i]->average_level : 0;
        }

        // Ambil data tahunan rata-rata selama 12 bulan terakhir
        $yearlyData = GasLevel::selectRaw('YEAR(created_at) as year, AVG(gas_level) as average_level')
                              ->where('created_at', '>=', Carbon::now()->subYear())
                              ->groupBy('year')
                              ->orderBy('year', 'ASC')
                              ->get()
                              ->keyBy('year')
                              ->mapWithKeys(function ($item) {
                                  return [$item->year => $item->average_level];
                              });

        return view('analisis', compact('dailyAverages', 'monthlyAverages', 'yearlyData'));
    }
}
