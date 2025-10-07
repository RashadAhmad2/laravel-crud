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
            max-width: 800px;
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
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn-submit {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #2980b9;
        }
        .required {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data Pegawai</h3>
        
        <form action="/store" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan <span class="required">*</span></label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" required>
            </div>
            
            <div class="form-group">
                <label for="jabatan">Jabatan <span class="required">*</span></label>
                <input type="text" id="jabatan" name="jabatan" required>
            </div>
            
            <div class="form-group">
                <label for="umur">Umur <span class="required">*</span></label>
                <input type="number" id="umur" name="umur" min="18" max="65" required>
            </div>
            
            <div class="form-group">
                <label for="almt">Alamat <span class="required">*</span></label>
                <textarea id="almt" name="almt" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="gaji">Gaji <span class="required">*</span></label>
                <input type="number" id="gaji" name="gaji" min="0" step="0.01" required>
            </div>
            
            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>
    </div>
</body>
</html>