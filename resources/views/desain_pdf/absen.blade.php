<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .wrapper-page {
            page-break-after: always;
        }

        .page {
            width: 100%;
            height: 100%;
        }

        .wrapper-page:last-child {
            page-break-after: avoid;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        .title {
            margin: 5px 0;
        }
    </style>

</head>

<body>
<table style="font-family: Arial, Helvetica, sans-serif;">
    <tr>
        <td style="width: 100px;">
            @php
                $imagePath = public_path('storage/' . $letterheads->logo);
                if (file_exists($imagePath)) {
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageDataUri = 'data:image/png;base64,' . $imageData;
                }
            @endphp
            @if (isset($imageDataUri))
                <img src="{{ $imageDataUri }}" alt="Logo" style="max-width: 100%; height: auto;">
            @endif
        </td>
        <td style="text-align: center; width: 600px;">
            <h4 style="margin: 0">{{ $letterheads->letterhead_top }}</h4>
            <h3 style="margin: 0">{{ $letterheads->letterhead_middle }}</h3>
            <h5 style="margin: 0">{{ $letterheads->letterhead_bottom }}</h5>
            <p style="margin: 0; font-size: 15px">{{ $letterheads->footer }}</p>
        </td>
    </tr>
</table>
<hr>
<table style="font-family: Arial, Helvetica, sans-serif; width: 100%;">
    <tr>
        <td style="text-align: center;">
            <h5>ABSENSI KEGIATAN PRAKTEK KERJA LAPANGAN (PKL)</h5>
        </td>
    </tr>
</table>
<div class="flex justify-center mt-3 mb-5">
    <div class="flex justify-center">
        <h6>Bulan : {{ \Carbon\Carbon::create()->month((int) $month)->locale('id')->format('F') }} {{ $year }}</h6>

        <table id="customers" style="border: 1px solid black; border-collapse: collapse;">
            <thead>
            <tr style="font-size: 12px">
                <th>No</th>
                <th>Tanggal</th>
                <th>Tipe Absen</th>
                <th>Keterangan</th>
                <th>Masuk</th>
                <th>Istirahat</th>
                <th>Kembali</th>
                <th>Pulang</th>
                <th>Paraf Pembimbing</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $attendance)
                <tr style="text-align: center; font-size: 9px">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                    {{ \Carbon\Carbon::parse($attendance->created_at)->locale('id')->isoFormat('D MMMM Y') }}
                    <td class="text-center">
                        @php
                            $attendanceType = $attendance->attendance_type ?? null;
                            $typeBadge = $attendanceType === 'offline' ? 'success' : ($attendanceType === 'online' ? 'warning' : 'secondary');
                        @endphp
                        @if ($attendanceType)
                            <span class="badge bg-{{ $typeBadge }}-subtle text-{{ $typeBadge }} py-2 px-3">
                            {{ $attendanceType }}
                        </span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary py-2 px-3">-</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @php
                            $status = strtolower($attendance->status ?? 'alpha');
                            $statusBadge = match ($status) {
                                'masuk' => 'success',
                                'izin', 'sakit' => 'warning',
                                default => 'danger',
                            };
                        @endphp
                        <span class="badge bg-{{ $statusBadge }}-subtle text-{{ $statusBadge }} py-2 px-3">
                        {{ ucfirst($status) }}
                    </span>
                    </td>
                    <td class="text-center">
                        @include('partials.attendance-time', [
                            'details' => $attendance->attendanceDetails ?? [],
                            'checkType' => 'present',
                            'timeLimit' => $rule?->checkin_ends ?? '08:00:00',
                        ])
                    </td>
                    <td class="text-center">
                        @include('partials.attendance-time', [
                            'details' => $attendance->attendanceDetails ?? [],
                            'checkType' => 'break',
                            'timeLimit' => $rule?->break_ends ?? '12:35:00',
                        ])
                    </td>
                    <td class="text-center">
                        @include('partials.attendance-time', [
                            'details' => $attendance->attendanceDetails ?? [],
                            'checkType' => 'return_break',
                            'timeLimit' => $rule?->return_ends ?? '13:00:00',
                        ])
                    </td>
                    <td class="text-center">
                        @include('partials.attendance-time', [
                            'details' => $attendance->attendanceDetails ?? [],
                            'checkType' => 'return',
                            'timeLimit' => '18:00:00',
                        ])
                    </td>
                    <td>
                        @php
                            $imagePath = public_path('berkas/ttd.png');
                        @endphp
                        @if (file_exists($imagePath))
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents($imagePath)) }}"
                                 alt="Tanda Tangan" width="100px">
                        @else
                            Tanda tangan tidak tersedia
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin-top: 5%; padding-left: 69%; width: 230px;">
        <div style="text-align: center;">
            <div style="margin-bottom: 8px">
                Ttd Pembimbing
            </div>
            <div style="margin-top:70px">
                Andika Wahyu Perdana, S.Kom
            </div>
            <div style="margin-top: 10px;">
            </div>
        </div>
    </div>
</div>
</body>

</html>
