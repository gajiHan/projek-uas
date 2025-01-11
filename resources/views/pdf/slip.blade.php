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
    <center> <h2 class="text-center text-xl font-bold mb-3">SLIP</h2></center>
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
      <th>Bulan</th>
      <th>Nama Karyawan</th>
      <th>Nama Departemen</th>
      <th>Gaji</th>
      <th>Tunjangan</th>
      <th>Total Pendapatan</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($slips as $slip)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $slip->bulan }}</td>
        <td>{{ $slip->karyawan->nama ?? 'Tidak Ada' }}</td>
        <td>{{ $slip->departemen->nama_departemen ?? 'Tidak Ada' }}</td>
        <td>{{ $slip->gaji->total_gaji ?? 'Tidak Ada' }}</td>
        <td>{{ $slip->tunjangan->jumlah_tunjangan ?? 'Tidak Ada' }}</td>
        <td>{{ $slip->total_pendapatan }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

</body>
</html>
