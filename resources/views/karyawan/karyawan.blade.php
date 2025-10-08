<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h3 {
            color: #2c3e50;
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-tambah {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .btn-tambah:hover {
            background-color: #219a52;
        }
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-style: italic;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .btn-edit {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #e67e22;
        }
        .btn-hapus {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }
        .btn-hapus:hover {
            background-color: #c0392b;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .gaji {
            text-align: right;
        }
        .gaji::before {
            content: "Rp ";
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>
            Data Pegawai
            <a href="/tambah" class="btn-tambah">+ Tambah Pegawai</a>
        </h3>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            @if(count($pg) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pg as $index => $karyawan)
                        <tr>
                           <td>{{$karyawan->id_karyawan}}</td>
                            <td>{{ $karyawan->nama_karyawan }}</td>
                            <td>{{ $karyawan->jabatan }}</td>
                            <td>{{ $karyawan->umur }} tahun</td>
                            <td>{{ $karyawan->alamat }}</td>
                            <td class="gaji">{{ number_format($karyawan->gaji, 0, ',', '.') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="edit/{{$karyawan->id_karyawan}}" class="btn-edit">Edit</a>
                                    <form action="/hapus/{{$karyawan->id_karyawan}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    <p>Belum ada data pegawai.</p>
                    <a href="/tambah" class="btn-tambah">Tambah Pegawai Pertama</a>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Script untuk menghilangkan notifikasi setelah 5 detik
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                setTimeout(function() {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.5s';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
</body>
</html>