<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @page {
        margin: 0px;
    }

    body {
        margin: 0px;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        /* background-color: red; */
        color: white;
    }

    table,
    td,
    th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 10px;
    }
</style>

<body style="padding:0px; margin:0px">

    <div style="padding:0px; margin:0px">
        {{-- <img style="margin: 0px; padding: 0px; width:100%" src="{{ asset('image/header.png') }}" alt="" srcset=""> --}}
        <img style="margin: 0px; padding: 0px; width:100%" src="{{ storage_path('../public/berkas/header.png') }}"
            alt="" srcset="">
    </div>

    @php
        // $formattedNamaSekolah = preg_replace('/([^\d]*)(\d+)([^\d]*)/', 'SMKN $2 $3', $data['sekolah']);
    @endphp

    <div class="" style="margin: 0% 12% ">

        <div style="text-align: left">
            {{-- <p style="font-family: 'Times New Roman', Times, serif; font-weight: 500; font-size: 23px; margin-top: 40px; text-decoration: underline; margin-bottom:0px">SURAT PERINGATAN KERJA</p> --}}
            <p style="font-family: 'Times New Roman', Times, serif; font-size:15px; margin-top:20px;">
                Nomor : {{ $data['letter_number'] }}/PKL/HMTI/{{ date('Y') }}
            </p>
            <p style="font-family: 'Times New Roman', Times, serif; font-size:15px; margin-top:20px;">
                Lamp. : -
            </p>
            <p
                style="font-family: 'Times New Roman', Times, serif; font-size:15px; margin-top:20px; margin-bottom: 10px">
                Perihal : <b>Praktek Kerja Lapangan</b>
            </p>
            <p style="font-family: 'Times New Roman', Times, serif; font-size:15px; margin-top:0px; margin-left:10%">
                Kepada Yth: <br>
                {{ $data['school'] }} <br>
                @if ($data['school_address'] && $data['school_phone'])
                    {{ $data['school_address'] }} <br>
                    Telp. {{ $data['school_phone'] }} <br>
                @else
                @endif

            </p>
            <p style="font-family: 'Times New Roman', Times, serif; font-size:15px; margin-top:20px;">
                Dengan Hormat,
            </p>
        </div>
        <p
            style="font-family: 'Times New Roman', Times, serif; font-size: 15px; text-align: justify; text-indent: 2em; line-height: 1.5;">
            Menindaklanjuti Praktek Kerja Lapangan, bersama dengan surat ini kami dapat menerima Praktek Kerja Lapangan
            (PKL) untuk {{ $data['school'] }}
            pada tanggal {{ $data['start_date'] }} – {{ $data['finish_date'] }} untuk melakukan kerja praktek di PT
            Humma Teknologi Indonesia. Berikut ini adalah nama-nama pendaftar yang akan melaksanakan PKL di PT Humma
            Teknologi Indonesia:
        </p>
        <div>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nomer Induk/NIM</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['identify_number'] }}</td>
                </tr>
            </table>
        </div>
        <p
            style="font-family: 'Times New Roman', Times, serif; font-size: 15px; margin-top: 15px; text-align: justify; line-height: 1.5; text-indent: 2em;">
            Demikian surat ini kami sampaikan dan atas kerja samanya kami mengucapkan terima kasih.
        </p>
        <div style="float: right; text-align: center; margin-top: 10%; max-width:35%">
            <style>
                .underline-text {
                    margin-bottom: 40px;
                    text-decoration: underline;
                }
                .right-left-margin {
                    margin-left: 35px;
                    margin-right: 20px;
                }
            </style>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 15px;  line-height: 1.5; margin-bottom: 40px;"
                class="mb-2">Malang, {{ $data['date'] }}</p>
            <div style="position: relative;">
                <img style="margin: 0px; padding: 0px; width:70%; position: absolute; top: 0; left: 0; z-index: 1;"
                    src="{{ storage_path('../public/berkas/tdd_Af_Rizal_Himawan.png') }}" alt=""
                    srcset="">
                <p
                    style="font-family: 'Times New Roman', Times, serif; font-size: 15px; position: relative; z-index: 2; margin-top: -20px;">
                    PT HUMMA TEKNOLOGI INDONESIA</p>
                <p style="font-family: 'Times New Roman', Times, serif; font-size: 15px; position: relative; z-index: 2; margin-top: 70px;"
                    class="underline-text">Afrizal Himawan S.Kom</p>
            </div>
            <p
                style="font-family: 'Times New Roman', Times, serif; font-size: 15px; line-height: 0; margin-top: -20px;"class="right-left-margin">
                Direktur</p>
        </div>
    </div>
    <footer class="footer">
        {{-- <img style="margin: 0px; padding: 0px; width:100%" src="{{ asset('image/footer_pdf.png') }}" alt="" srcset=""> --}}
        <img style="margin: 0px; padding: 0px; width:100%; object-fit:cover"
            src="{{ storage_path('../public/berkas/footer_pdf.png') }}" alt="" srcset="">
    </footer>
</body>

</html>
