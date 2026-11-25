<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\StatusJournalEnum;
use App\Models\Journal;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminJournalRepository extends BaseRepository implements AdminJournalInterface
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    /**
     * search
     *
     * @param  mixed $request
     * @return mixed
     */
    // public function search(Request $request): mixed
    // {
    //     return $this->model->query()
    //     ->when($request->name, function ($query) use ($request) {
    //         $query->whereRelation('student', 'name', 'LIKE', '%' . $request->name . '%');
    //     })
    //     ->when($request->created_at, function ($query) use    ($request) {
    //         $query->whereDate('created_at', $request->created_at);
    //     })
    //     ->get();
    // }

    public function search(Request $request): mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->name . '%');
            });
        });

        $dateFrom = $request->filled('date_from') ? $request->date_from : Carbon::today()->toDateString();
        $dateTo   = $request->filled('date_to')   ? $request->date_to   : Carbon::today()->toDateString();
        $query->whereDate('created_at', '>=', $dateFrom)->whereDate('created_at', '<=', $dateTo);

        return $query;
    }



    public function getByStatus(string $status): mixed
    {
        return $this->model->query()->where('status', $status)->get();
    }

    public function NotFillin(Request $request): mixed
    {
        $dateFrom = $request->filled('date_from') ? $request->date_from : Carbon::today()->toDateString();
        $dateTo   = $request->filled('date_to')   ? $request->date_to   : Carbon::today()->toDateString();

        return $this->model->query()
            ->where('status', StatusJournalEnum::NOTFILLING->value)
            ->whereDate('created_at', '>=', $dateFrom)
            ->whereDate('created_at', '<=', $dateTo)
            ->paginate(10, ['*'], 'notfilling_page');
    }

}
