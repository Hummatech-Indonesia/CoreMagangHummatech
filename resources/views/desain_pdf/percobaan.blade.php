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
</style>

<body style="padding:0px; margin:0px">

    <div style="padding:0px; margin:0px">
        {{-- <img style="margin: 0px; padding: 0px; width:100%" src="{{ asset('image/header.png') }}" alt="" srcset=""> --}}
        <img style="margin: 0px; padding: 0px; width:100%" src="{{ storage_path('../public/berkas/header.png') }}"
            alt="" srcset="">
    </div>
    <div style="text-align: center">
        <p
            style="font-family: 'Times New Roman', Times, serif; font-weight: 500; font-size: 23px; margin-top: 40px; text-decoration: underline; margin-bottom:0px">
            SURAT PERINGATAN KERJA</p>
        <p style="font-family: 'Times New Roman', Times, serif; font-size:18px; font-weight: 500; margin-top:20px;">
            Nomor : {{ $data['reference_number'] }}/SP/PKL/I/{{ date('Y') }}
        </p>
    </div>
    @php
        $formattedNamaSekolah = preg_replace('/([^\d]*)(\d+)([^\d]*)/', 'SMKN $2 $3', $data['school']);
    @endphp

    <div class="" style="margin: 0% 12% ">
        <p
            style="font-family: 'Times New Roman', Times, serif; font-size: 15px;text-align: justify;   line-height: 1.5; ">
            Dengan Hormat <br>
        </p>
        <p
            style="font-family: 'Times New Roman', Times, serif; font-size: 15px;text-align: justify; text-indent: 2em; line-height: 1.5; ">
            &emsp; Dengan ini kami beritahukan jika kami sudah memutuskan untuk memberikan
            <b>SP{{ $data['status'] }}</b> kepada <b style=" text-transform: uppercase;">{{ $data['name'] }}</b> Asal <b
                style=" text-transform: uppercase;">{{ $formattedNamaSekolah }} </b>, pada tanggal {{ $data['date'] }}.
        </p>
        <p
            style="font-family: 'Times New Roman', Times, serif; font-size: 15px;text-align: justify;   line-height: 1.5;text-indent: 2em; ">
            &emsp; Keputusan ini terpaksa kami ambil setelah mempertimbangkan banyak hal, diantaranya : yang
            bersangkutan telah melanggar peraturan yang telah diterapkan oleh perusahaan yaitu
            <b>{{ $data['reason'] }}</b>.

            @if ($data['status'] == 'WARNING_LETTER_ONE')
                Kami berharap agar yang bersangkutan bisa menerima dan memaklumi keputusan ini dan jika mengulangi
                kembali
                harus bersedia untuk dikembalikan dan diberhentikan sebagai siswa magang di PT Humma Teknologi
                Indonesia.
            @elseif($data['status'] == 'WARNING_LETTER_TWO')
                Kami berharap agar yang bersangkutan bisa menerima dan memaklumi keputusan ini dan jika mengulangi
                kembali
                harus bersedia untuk dikembalikan dan diberhentikan sebagai siswa magang di PT Humma Teknologi
                Indonesia.
            @elseif($data['status'] == 'WARNING_LETTER_THREE')
                Kami berharap agar yang bersangkutan bisa menerima dan memaklumi keputusan ini dan telah diberhentikan
                sebagai siswa magang di PT Humma Teknologi Indonesia.
            @endif

        </p>
        <p
            style="font-family: 'Times New Roman', Times, serif; font-size: 15px;text-align: justify;   line-height: 1.5; text-indent: 2em; ">
            &emsp;Demikian surat peringatan kerja ini kami sampaikan, atas perhatian dan kerjasamanya, kami ucapkan
            terimakasih.
        </p>

        <div style="float: right; text-align: center; margin-top: 10%; max-width:35%">
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 15px;  line-height: 1.5;">Malang,
                {{ $data['date'] }}</p>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 15px;">PT HUMMA TEKNOLOGI INDONESIA</p>
            <div style="">
                {{-- <img style="margin: 0px; padding: 0px; width:70%;" src="{{ asset('image/ttd.png') }}" alt="" srcset=""> --}}
                <img style="margin: 0px; padding: 0px; width:70%;" src="{{ storage_path('../public/berkas/ttd.png') }}"
                    alt="" srcset="">
            </div>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 15px;">Andika Wahyu Perdana, S.Kom</p>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 15px; line-height: 1.5; ">HRD</p>
        </div>

    </div>
    <footer class="footer">
        {{-- <img style="margin: 0px; padding: 0px; width:100%" src="{{ asset('image/footer_pdf.png') }}" alt="" srcset=""> --}}
        <img style="margin: 0px; padding: 0px; width:100%; object-fit:cover"
            src="{{ storage_path('../public/berkas/footer_pdf.png') }}" alt="" srcset="">
    </footer>
</body>

</html>
