<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Slip</title>
</head>
<body class="bg-gray-100 p-5">
  <div class="max-w-4xl mx-auto bg-white p-5 rounded shadow">
    <center> <h2 class="text-center text-xl font-bold mb-3">GAJI</h2></center>
    <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    border: 2px solid black;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: #f3f4f6;
  }
</style>

<table>
  <thead>
    <tr>
        <th>No</th>
         <th>Nama Karyawan</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Gaji Pokok</th>
        <th>Potongan</th>
        <th>Lembur</th>
        <th>Total Gaji</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($gajis as $gaji)
    <tr id="index_{{ $gaji->id }}">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $gaji->karyawan->nama ?? 'Tidak Ada' }}</td>
        <td>{{ $gaji->bulan }}</td>
        <td>{{ $gaji->tahun }}</td>
        <td>{{ $gaji->gaji_pokok }}</td>
        <td>{{ $gaji->potongan->jumlah_potongan ?? 'Tidak Ada' }}</td>
        <td>{{ $gaji->lembur->total_lembur ?? 'Tidak Ada' }}</td>
        <td>{{ $gaji->total_gaji }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</body>
</html>
