<?php

namespace App\Services;

namespace App\Services;

use App\Http\Requests\StorePresentationRequest;
use App\Models\Presentation;

class PresentationService
{
    public function storedate(StorePresentationRequest $request, $useId)
    {
        $data = []; // Inisialisasi variabel data

        foreach ($request->mission as $key => $value) {
            $data[] = [
                'start_date' => $value,
                'end_date' => $value,
                'schedule_to' => $value,
            ];
        }

        // Pastikan data tidak kosong sebelum menyimpan
        if (!empty($data)) {
            foreach ($data as $item) {
                Presentation::create($item);
            }
        }

        return $data;
    }

    // public function updatemision(UpdateVisionAndMisionRequest $request, MisionItems $misionItems)
    // {
    //     MisionItems::findOrfail($misionItems->id)->update($request->all());
    // }

    // public function destroy(MisionItems $misionItems)
    // {
    //     $misionItems->delete($misionItems->id);
    // }
}

