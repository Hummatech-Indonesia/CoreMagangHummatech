<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com%22%3E/"></script>
    <script>
        theme: {
            extend: {
                blur: {
                    xs: '3px',
                }
            },
        }
    </script>
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


        /*
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #76a9fa;
            color: white;
        } */
    </style>

</head>

<body>
    {{-- @require ('vendor/autoload.php'); --}}
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
                    <img src="{{ $imageDataUri }}" alt="Logo" style="max-width: 100%; height: auto; display:flex;">
                @endif
            </td>
            <td style="text-align: center; justify-content: center; width: 600px; margin: 0">
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
                <h5>JURNAL KEGIATAN PRAKTEK KERJA LAPANGAN (PKL)</h5>
            </td>
        </tr>
    </table>
    <div class="flex justify-center mt-3 mb-5" style="display: flex; justify-content: center;">
        <div class="flex justify-center">
            <table id="customers" class="data"
                style="border: 1px solid black; border-collapse: collapse; margin-top:2%">
                <thead>
                    <tr style="font-size: 12px">
                        <th scope="col" class="px-6">No</th>
                        <th scope="col" class="px-6">Tanggal</th>
                        <th scope="col" class="px-6">Nama</th>
                        <th scope="col" class="px-6">sekolah</th>
                        <th scope="col" class="px-6">Kegiatan</th>
                        <th scope="col" class="px-6">Bukti</th>
                        <th scope="col" class="px-6">Paraf Pembimbing</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr style="text-align: center; font-size: 9px">
                            <td class="px-1 md:px-4">{{ $loop->iteration }}</td>
                            <td class="px-1 md:px-4">
                                {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y') }}
                            </td>
                            <td class="px-1 md:px-4">{{ $item->student->name }}</td>
                            <td class="px-1 md:px-4">{{ $item->student->school }}</td>
                            <td class="p-1 md:px-4" style="word-break: break-word;">{{ $item->description }}</td>
                            <td>
                                @php
                                    $path = storage_path('app/public/' . $item->image);
                                    if (file_exists($path)) {
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        $data = file_get_contents($path);
                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    } else {
                                        $base64 = '';
                                    }
                                @endphp
                                @if ($base64)
                                    <img src="{{ $base64 }}" width="50px" height="50px"
                                        alt="{{ $item->image }}">
                                @else
                                    Gambar tidak tersedia
                                @endif
                            </td>
                            <td class="px-1 md:px-4">
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
        <div style="margin-top: 5%; padding-left: 80%">
            <div style="text-align: center">
                <div style="margin-bottom: 8px">
                    Ttd Pembimbing
                </div>
                <img src="{{ $qrCodeImage }}" alt="QR Code">
                <div style="margin-top: 10px; decoration: underline">
                </div>
            </div>
        </div>

        <script>
            // Fungsi untuk mencetak halaman
            function printPage() {
                window.print();
            }
        </script>

</body>

</html>
