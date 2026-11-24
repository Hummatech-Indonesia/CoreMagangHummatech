<?php

namespace App\Exports;

use App\Models\Journal;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JournalExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithStyles
{
    use Exportable;

    private ?string $name;
    private ?string $date;
    private ?int $studentId;

    public function __construct(?string $name = null, ?string $date = null, ?int $studentId = null)
    {
        $this->name = $name;
        $this->date = $date;
        $this->studentId = $studentId;
    }

    public function headings(): array
    {
        return ['No', 'Nama Siswa', 'Sekolah', 'Tanggal', 'Status', 'Deskripsi'];
    }

    public function collection()
    {
        $journals = Journal::with('student')
            ->when($this->studentId, fn($query) => $query->where('student_id', $this->studentId))
            ->when($this->name, function ($query) {
                $query->whereHas('student', fn($q) => $q->where('name', 'LIKE', '%' . $this->name . '%'));
            })
            ->when($this->date, fn($query) => $query->whereDate('created_at', $this->date))
            ->orderBy('created_at', 'asc')
            ->get();

        return $journals->map(function ($journal, $index) {
            return [
                $index + 1,
                $journal->student->name ?? '-',
                $journal->student->school ?? '-',
                Carbon::parse($journal->created_at)->locale('id')->isoFormat('dddd, D MMMM Y'),
                $journal->status === 'fillin' ? 'Mengisi' : 'Tidak Mengisi',
                $journal->description,
            ];
        });
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow    = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle("A1:{$highestColumn}1")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'       => ['argb' => '000000'],
                ],
            ],
        ]);

        $this->applyStatusStyles($sheet, $highestRow);
    }

    private function applyStatusStyles(Worksheet $sheet, int $highestRow): void
    {
        for ($row = 2; $row <= $highestRow; $row++) {
            $status = $sheet->getCell('E' . $row)->getValue();
            $color  = match ($status) {
                'Mengisi'       => 'd2f0e3',
                'Tidak Mengisi' => 'fedbda',
                default         => null,
            };
            if ($color) {
                $sheet->getStyle('E' . $row)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB($color);
            }
        }
    }

    public function title(): string
    {
        return 'Data Jurnal';
    }
}
