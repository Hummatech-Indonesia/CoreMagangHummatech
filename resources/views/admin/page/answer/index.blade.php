<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Siswa</th>
            <th>File</th>
            <th>Link</th>
            <th>status</th>
            <th colspan="2">Aksi</th>
        </tr>
        @foreach ($submitTasks as $answer)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $answer->student->name }}</td>
            <td>{{ $answer->file }}</td>
            <td>{{ $answer->link }}</td>
            <td>{{ $answer->status }}</td>
            @if ($answer->status == "pending")
            <td>
                <form action="{{ route('submit.task.answer.update-status', $answer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="agree">
                    <button type="submit">Terima</button>
                </form>
            </td>
            <td>
                <form action="{{ route('submit.task.answer.update-status', $answer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="reject">
                    <button type="submit">Tolak</button>
                </form>
            </td>
            @else
            <td colspan="2"></td>
            @endif

        </tr>
        @endforeach
    </table>
</body>
</html>
