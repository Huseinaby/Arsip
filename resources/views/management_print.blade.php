<!-- management_print.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Semua Data IMB</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        @media print {
            .hidden-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
<h3 style="text-align: center;">{{ $title }}</h3>
    <table>
        <thead>
            <tr>
                <th>NO DP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Boks</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->nomor_dp }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->box }}</td>
                    <td>{{ $item->tahun }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>