<?php
namespace App\Services;

use App\Http\Requests\StorePresentationRequest;
use App\Models\Presentation;
use DB;

class PresentationService
{
    public function storePresentations(array $validatedData)
    {
        // Ambil data yang telah divalidasi
        $startDates = $validatedData['start_date'];
        $endDates = $validatedData['end_date'];
        $scheduleTo = $validatedData['schedule_to'];

        // Gunakan transaksi database untuk memastikan keamanan data
        DB::beginTransaction();

        try {
            // Loop untuk setiap jadwal
            foreach ($startDates as $key => $startDate) {
                // Simpan data ke dalam database
                Presentation::create([
                    'start_date' => $startDate,
                    'end_date' => $endDates[$key],
                    'schedule_to' => $scheduleTo,
                ]);
            }

            // Jika semua data berhasil disimpan, commit transaksi
            DB::commit();

            // Beri respons bahwa data berhasil ditambahkan
            return ['success' => true];
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, rollback transaksi dan beri pesan kesalahan
            DB::rollBack();
            return ['success' => false];
        }
    }
}

