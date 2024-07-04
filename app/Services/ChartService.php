<?php

namespace App\Services;

use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\NewsInterface;
use Carbon\Carbon;
use App\Contracts\Interfaces\VisitorInterface;

class ChartService
{
    private JournalInterface $journal;
    public function __construct(JournalInterface $journal)
    {
        $this->journal = $journal;
    }

    public function JournalChart()
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $news = $this->news->NewsChart($Curentyear, $month);

            $grafikDataCollection[] = [
             'year' => $Curentyear,
             'month' => $yearMonth,
             'news' => $news
            ];
        }
        $data  = array_values($grafikDataCollection);


        return $data;
    }
}
