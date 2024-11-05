<?php

namespace App\Http\Controllers;

use App\Models\GasLevel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGasLevelRequest;
use App\Http\Requests\UpdateGasLevelRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;

class GasLevelController extends Controller
{
    const MAX_RECORDS = 100; // Batas maksimal 100 records

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch gas levels from the database dengan menggunakan scope latestFirst
        $gasLevels = GasLevel::latestFirst()->get();

        // Show success notification (notifikasi sukses)
        notify()->error('Gas Amonia telah banyak ⚡️');

        // Pass the data to the view (Kirimkan data ke tampilan)
        return view('dashboard', ['gasLevels' => $gasLevels]);
    }

    /**
     * Retrieve all gas levels as JSON for API.
     */
    public function getGasLevelsApi()
    {
        // Fetch gas levels from the database dengan menggunakan scope latestFirst
        $gasLevels = GasLevel::latestFirst()->get();

        // Return the gas levels as JSON (Kembalikan gas levels sebagai JSON)
        return response()->json(['gasLevels' => $gasLevels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGasLevelRequest $request)
    {
        // Check if the number of records has reached the limit (Periksa jika jumlah catatan telah mencapai batas)
        if (GasLevel::count() >= self::MAX_RECORDS) {
            // Find the oldest record (Temukan catatan tertua)
            $oldestGasLevel = GasLevel::orderBy('created_at', 'asc')->first();

            // Update the oldest record with new data (Perbarui catatan tertua dengan data baru)
            $oldestGasLevel->update([
                'gas_level' => $request->input('gas_level'),
            ]);
        } else {
            // Otherwise, create a new record (Jika tidak, buat catatan baru)
            GasLevel::create($request->validated());
        }

        // Redirect or response as needed (Redirect atau tanggapan sesuai kebutuhan)
        return redirect()->route('gas-level.index')->with('success', 'Gas level berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GasLevel $gasLevel)
    {
        // Show details of a specific gas level (Tampilkan detail dari gas level tertentu)
        return view('gas-level.show', compact('gasLevel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GasLevel $gasLevel)
    {
        // Show the edit form for a specific gas level (Tampilkan formulir edit untuk gas level tertentu)
        return view('gas-level.edit', compact('gasLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGasLevelRequest $request, GasLevel $gasLevel)
    {
        // Update the specific gas level (Perbarui gas level tertentu)
        $gasLevel->update($request->validated());

        // Redirect or response as needed (Redirect atau tanggapan sesuai kebutuhan)
        return redirect()->route('gas-level.index')->with('success', 'Gas level berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GasLevel $gasLevel)
    {
        // Delete a specific gas level (Hapus gas level tertentu)
        $gasLevel->delete();

        // Redirect or response as needed (Redirect atau tanggapan sesuai kebutuhan)
        return redirect()->route('gas-level.index')->with('success', 'Gas level berhasil dihapus.');
    }

    /**
     * Display RTL (Real-Time Monitoring) page.
     */
    public function analisis()
    {
        // Get the averages
        $dailyAverages = $this->getDailyAverages();
        $monthlyAverages = $this->getMonthlyAverages();
        $yearlyData = $this->getYearlyData();

        // Return the view for analysis page with averages data
        return view('analisis', compact('dailyAverages', 'monthlyAverages', 'yearlyData'));
    }

    public function profile() {
        return view('profile');
    }

    /**
     * Get daily averages.
     */
    private function getDailyAverages()
    {
        $dailyAverages = GasLevel::select(DB::raw('DAYNAME(created_at) as day'), DB::raw('AVG(gas_level) as average'))
            ->groupBy('day')
            ->orderBy(DB::raw('FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")'))
            ->get()
            ->pluck('average', 'day')
            ->toArray();

        return $dailyAverages;
    }

    /**
     * Get monthly averages.
     */
    private function getMonthlyAverages()
    {
        $monthlyAverages = GasLevel::select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('AVG(gas_level) as average'))
            ->groupBy('month')
            ->orderBy(DB::raw('FIELD(month, "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")'))
            ->get()
            ->pluck('average', 'month')
            ->toArray();

        return $monthlyAverages;
    }

    /**
     * Get yearly data.
     */
    private function getYearlyData()
    {
        $yearlyData = GasLevel::select(DB::raw('YEAR(created_at) as year'), DB::raw('AVG(gas_level) as average'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get()
            ->pluck('average', 'year')
            ->toArray();

        return $yearlyData;
    }
}
