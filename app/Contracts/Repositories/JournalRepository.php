<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\JournalInterface;
use App\Models\Journal;
use Carbon\Carbon;

class JournalRepository extends BaseRepository implements JournalInterface
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    public function get(): mixed
    {
        return $this->model->query()->where('user_id', auth()->user()->id)->get();
    }

    public function store(array $data): mixed
    {
        $currentDate = Carbon::now()->locale('id_ID')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        if ($currentDate < '16:00:00' && $currentDate > '00:00:00') {
            return redirect()->back()->with('error', 'Anda hanya dapat mengisi jurnal di jam 16.00 - 00.00');
        } else {
            $existingData = $this->model->query()
                ->where('user_id', auth()->user()->id)
                ->where('created_at', '>=', now()->startOfDay())
                ->where('created_at', '<=', now()->endOfDay())
                ->first();

            if ($existingData) {
                return redirect()->back()->with('error', 'Anda Telah Mengisi Jurnal Hari ini.');
            }

            if (now()->isWeekend()) {
                return redirect()->back()->with('error', 'Hari ini adalah hari libur.');
            }

            $data['user_id'] = auth()->user()->id;
            $data['status'] = 'fillin';
            return $this->model->query()->create($data);

            return redirect()->back()->with('success', 'Jurnal Berhasil Ditambahkan');
        }
    }
    public function update(mixed $id, array $data): mixed
    {
        $data['user_id'] = auth()->user()->id;
        return $this->model->query()->findOrFail($id)->update($data);
    }
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }
}
