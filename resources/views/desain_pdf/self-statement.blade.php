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
    <div style="text-align: center;margin-top: 20px">
        <h4 style="margin: 6px">SURAT PERNYATAAN DIRI</h4>
        <h4 style="margin: 6px">MENGIKUTI PROGRAM MAGANG PT HUMMA TEKNOLOGI INDONESIA</h4>
    </div>
    <div>
        <table style="margin-top:20px; margin-left: 100px">
            <tr>
                <td>Saya yang bertanda tangan di bawah ini:</td>
            </tr>
        </table>
        <table style="margin-left: 100px; margin-top: 10px">
            <tr style="line-height: 1.5;">
                <td style="width: 200px;">Nama</td>
                <td style="">:</td>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr style="line-height: 1.5;">
                <td>Tempat, Tanggal lahir</td>
                <td>:</td>
                <td>{{ $data['birth_place'] }},
                    {{ \Carbon\Carbon::parse($data['birth_date'])->locale('id')->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr style="line-height: 1.5">
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td>{{ $data['address'] }}</td>
            </tr>
            <tr style="line-height: 1.5">
                <td>No. Telpon</td>
                <td>:</td>
                <td>{{ $data['phone'] }}</td>
            </tr>
            <tr style="line-height: 1.5">
                <td>Alamat Email</td>
                <td>:</td>
                <td>{{ $data['email'] }}</td>
            </tr>
        </table>

        <p style="margin-left: 125px; line-height: 2;">Dengan Ini Menyatakan dengan sesungguhnya bahwa:</p>
        <table style="margin-left: 100px; margin-top: -10px">
            <tr>
                <td style="width: 20px">1.</td>
                <td>Saya bersedia untuk mengikuti seluruh rangkaian kegiatan Program Magang di Hummatech.</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Saya bersedia melakukan Magang minimal 8 bulan di kantor PT. HUMMATECH</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Bersedia Mengikuti Tata Tertib yang telah ditetapkan oleh penyelenggara</td>
            </tr>
        </table>
        <p style="margin-left: 120px; margin-top: 15px">Demikian surat pernyataan ini saya buat dengan sebenar-sebenarnya, tanpa ada paksaan dan</p>
        <p style="margin-left: 100px; margin-top: -10px">tekanan dari pihak manapun</p>
    </div>
    <div style="float: right; text-align: center; margin-top: 10%; max-width:35%; padding: 90px;">
        <p style="font-family: 'Times New Roman', Times, serif; font-size: 16px;  line-height: 1.5;">.............., {{\carbon\Carbon::parse(now())->locale('id')->isoFormat('D MMMM Y')}}</p>
        <p style="font-family: 'Times New Roman', Times, serif; font-size: 16px; line-height: 4">({{ $data['name'] }})</p>
</div>
</body>

</html>
