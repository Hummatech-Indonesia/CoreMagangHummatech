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

<body style="padding:0px; margin:0px;font-size: 16px">

    <div style="padding:0px; margin:0px">
        {{-- <img style="margin: 0px; padding: 0px; width:100%" src="{{ asset('image/header.png') }}" alt="" srcset=""> --}}
        <img style="margin: 0px; padding: 0px; width:100%" src="{{ storage_path('../public/image/header.png') }}"
            alt="" srcset="">
    </div>
    <div style="text-align: center;margin-top: 20px">
        <h4 style="margin: 6px">SURAT PERNYATAAN DIRI ORANG TUA</h4>
    </div>
    <div>
        <table style="margin-top:10px; margin-left: 100px">
            <tr>
                <td>Saya yang bertanda tangan di bawah ini:</td>
            </tr>
        </table>
        <table style="margin-left: 100px">
            <tr style="line-height: 1.5;">
                <td style="width: 190px;">Nama</td>
                <td style="">:</td>
                <td>{{ $data['parent_name'] }}</td>
            </tr>
            <tr style="line-height: 1.5;">
                <td>No. KTP</td>
                <td>:</td>
                <td>{{ $data['identity_card'] }}</td>
            </tr>
            <tr style="line-height: 1.5">
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $data['parent_address'] }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal lahir</td>
                <td>:</td>
                <td>{{ $data['parent_place_birth'] }},
                    {{ \Carbon\Carbon::parse($data['parent_date_birth'])->locale('id')->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr style="line-height: 1.5">
                <td>No. Telpon</td>
                <td>:</td>
                <td>{{ $data['parent_phone'] }}</td>
            </tr>
        </table>
        <table style="margin-left: 100px; margin-top: 30px">
            <tr style="line-height: 1.5;">
                <td>Selaku orang tua/wali dari,</td>
            </tr>
            <tr style="line-height: 1.5;">
                <td style="width: 190px;">Nama</td>
                <td>:</td>
                <td>{{ $data['student_name'] }}</td>
            </tr>
            <tr style="line-height: 1.5;">
                <td>Tempat, Tanggal lahir</td>
                <td>:</td>
                <td>{{ $data['place_birth'] }},
                    {{ \Carbon\Carbon::parse($data['date_birth'])->locale('id')->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr style="line-height: 1.5;">
                <td>Jurusan</td>
                <td>:</td>
                <td>{{ $data['major'] }}</td>
            </tr>
            <tr style="line-height: 1.5;">
                <td>No. Telpon</td>
                <td>:</td>
                <td>{{ $data['phone'] }}</td>
            </tr>
        </table>

        <p style="margin-left: 160px; margin-top: 30px">Untuk menjalani program magang di PT Hummatech. Kami Mengizinkan anak kami</p>
        <p style="max-width:605px; margin-left: 100px; margin-top: -15px; text-align: justify">untuk berpartisipasi dalam kegiatan magang tersebut selama waktu yang telah di tentukan. Kami memahami bahwa selama magang, anak kami akan tunduk pada peraturan, dan tata tertib yang berlaku di PT. HUMMATECH. Kami juga menjamin bahwa anak kami akan melaksanakan tugasnya dengan penuh dedikasi dan integritas. Demikian surat pernyataan ini saya buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya, kami mengucapkan terima kasih.</p>
    </div>
    {{-- footer --}}

    <div style="margin-top: 5px; text-align: right; padding: 90px;">
        <div>
            <p>Hormat kami,</p>
            <p style="line-height: 4">(....................)</p>
        </div>
    </div>
    <footer class="footer">
        {{-- <img style="margin: 0px; padding: 0px; width:100%" src="{{ asset('image/footer_pdf.png') }}" alt="" srcset=""> --}}
        <img style="margin: 0px; padding: 0px; width:100%; object-fit:cover"
            src="{{ storage_path('../public/image/footer_pdf.png') }}" alt="" srcset="">
    </footer>
</body>

</html>
