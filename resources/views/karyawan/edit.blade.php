<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-kembali {
            background-color: #95a5a6;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .btn-kembali:hover {
            background-color: #7f8c8d;
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
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="number"]:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        .btn-submit {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            flex: 1;
        }
        .btn-submit:hover {
            background-color: #2980b9;
        }
        .btn-reset {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            flex: 1;
        }
        .btn-reset:hover {
            background-color: #c0392b;
        }
        .required {
            color: #e74c3c;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .current-photo {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .photo-preview {
            max-width: 150px;
            max-height: 150px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>
            Edit Data Pegawai
            <a href="/pegawai" class="btn-kembali">← Kembali</a>
        </h3>

        <!-- Notifikasi Error -->
        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @foreach($pg as $p)
        <form action="/storeUpdate" method="POST">
            @csrf
            @method('POST')
            
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan <span class="required">*</span></label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" 
                       value="{{$p->nama_karyawan}}" required>
            </div>
            
            <div class="form-group">
                <label for="jabatan">Jabatan <span class="required">*</span></label>
                <input type="text" id="jabatan" name="jabatan" 
                       value="{{$p->jabatan}}" required>
            </div>
            
            <div class="form-group">
                <label for="umur">Umur <span class="required">*</span></label>
                <input type="number" id="umur" name="umur" min="18" max="65" 
                       value="{{$p->umur}}" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat <span class="required">*</span></label>
                <textarea id="alamat" name="alamat" required>{{$p->alamat}}</textarea>
            </div>
            
            <div class="form-group">
                <label for="gaji">Gaji <span class="required">*</span></label>
                <input type="number" id="gaji" name="gaji" min="0" step="0.01" 
                       value="{{$p->gaji}}" required>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn-submit">Update Data</button>
                <button type="reset" class="btn-reset">Reset</button>
            </div>
        </form>
    </div>
    @endforeach

    <script>
        // Script untuk konfirmasi sebelum reset form
        document.addEventListener('DOMContentLoaded', function() {
            const resetBtn = document.querySelector('.btn-reset');
            if (resetBtn) {
                resetBtn.addEventListener('click', function(e) {
                    if (!confirm('Yakin ingin mengembalikan data ke nilai semula?')) {
                        e.preventDefault();
                    }
                });
            }

            // Validasi client-side sederhana
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const umur = document.getElementById('umur').value;
                const gaji = document.getElementById('gaji').value;
                
                if (umur < 18 || umur > 65) {
                    alert('Umur harus antara 18 - 65 tahun');
                    e.preventDefault();
                    return;
                }
                
                if (gaji < 0) {
                    alert('Gaji tidak boleh negatif');
                    e.preventDefault();
                    return;
                }
            });
        });
    </script>
</body>
</html>