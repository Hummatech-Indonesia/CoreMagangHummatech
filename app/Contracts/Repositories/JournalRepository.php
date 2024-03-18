<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\JournalInterface;
use App\Models\Journal;

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

        $currentTime = now();
        $startTime = $currentTime->copy()->setHour(16)->setMinute(0)->setSecond(0);
        $endTime = $currentTime->copy()->setHour(23)->setMinute(59)->setSecond(59);

        if (!$currentTime->isBetween($startTime, $endTime)) {
            return redirect()->back()->with('error', 'Pembuatan jurnal hanya diizinkan antara jam 16:00 sampai 23:59.');
        }

        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'fillin';
        return $this->model->query()->create($data);
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
