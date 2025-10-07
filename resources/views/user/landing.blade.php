<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Management System - Tentang Kami</title>
    <style>
        /* Reset dan Styling Dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header dan Navigasi */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background-color: #1a3a5f;
            color: white;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        
        .top-nav-links {
            display: flex;
            gap: 25px;
        }
        
        .top-nav-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        
        .top-nav-links a:hover {
            color: #4da8ff;
        }
        
        .logout-btn {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #ff5252;
        }
        
        /* Menu Utama */
        .main-menu {
            display: flex;
            justify-content: center;
            background-color: #fff;
            padding: 15px 0;
            border-bottom: 1px solid #eaeaea;
        }
        
        .main-menu a {
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .main-menu a:hover, .main-menu a.active {
            background-color: #4da8ff;
            color: white;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #1a3a5f 0%, #2c5282 100%);
            color: white;
            padding: 80px 5%;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }
        
        /* About Section */
        .about {
            padding: 80px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-title {
            font-size: 32px;
            margin-bottom: 50px;
            color: #1a3a5f;
            text-align: center;
        }
        
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        
        .about-text h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1a3a5f;
        }
        
        .about-text p {
            margin-bottom: 20px;
            color: #555;
        }
        
        .about-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* Values Section */
        .values {
            background-color: #f0f5ff;
            padding: 80px 5%;
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .value-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .value-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: #4da8ff;
        }
        
        .value-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #1a3a5f;
        }
        
        .value-description {
            color: #666;
        }
        
        /* Team Section */
        .team {
            padding: 80px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .team-member {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }
        
        .team-member:hover {
            transform: translateY(-10px);
        }
        
        .member-photo {
            height: 200px;
            background-color: #e0e7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            color: #4da8ff;
        }
        
        .member-info {
            padding: 20px;
        }
        
        .member-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #1a3a5f;
        }
        
        .member-role {
            color: #4da8ff;
            margin-bottom: 10px;
        }
        
        .member-bio {
            color: #666;
            font-size: 14px;
        }
        
        /* Footer */
        footer {
            background-color: #1a3a5f;
            color: white;
            padding: 40px 5% 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #4da8ff;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: #4da8ff;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #ccc;
            font-size: 14px;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            .top-nav {
                flex-direction: column;
                gap: 15px;
            }
            
            .main-menu {
                flex-wrap: wrap;
            }
            
            .hero h1 {
                font-size: 28px;
            }
            
            .hero p {
                font-size: 16px;
            }
            
            .about-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="top-nav">
            <div class="logo">HRMS</div>
            <div class="top-nav-links">
                <a href="#">Produk</a>
                <a href="/karyawan">Karyawan</a>
                <a href="#">Bantuan</a>
                <a href="#">Employee Benefits</a>
                <a href="#">FWD MAX</a>
                <a href="#">FWD Care</a>
                <a href="#">Tentang kami</a>
            </div>
            <!-- <button class="logout-btn">Logout</button> -->
             <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
        </div>
        
        <div class="main-menu">
            <a href="/karyawan">Karyawan</a>
            <a href="#">Gaji Karyawan</a>
            <a href="#">Lembur Karyawan</a>
            <a href="#">Golongan Tunjangan</a>
        </div>
    </header>
    
    <section class="hero">
        <h1>Tentang HR Management System</h1>
        <p>Kami adalah penyedia solusi manajemen SDM terkemuka yang membantu perusahaan mengelola karyawan dengan lebih efisien dan efektif.</p>
    </section>
    
    <section class="about">
        <h2 class="section-title">Tentang Kami</h2>
        <div class="about-content">
            <div class="about-text">
                <h3>Visi Kami</h3>
                <p>Menjadi platform manajemen SDM terdepan yang mengubah cara perusahaan mengelola sumber daya manusia mereka, menciptakan lingkungan kerja yang lebih produktif dan harmonis.</p>
                
                <h3>Misi Kami</h3>
                <p>Menyediakan solusi teknologi inovatif yang menyederhanakan proses manajemen karyawan, penggajian, dan tunjangan, sehingga perusahaan dapat fokus pada pertumbuhan bisnis inti mereka.</p>
                
                <h3>Sejarah Perusahaan</h3>
                <p>Didirikan pada tahun 2010, HRMS telah berkembang dari startup kecil menjadi penyedia solusi HR terpercaya bagi lebih dari 500 perusahaan di seluruh Indonesia. Kami terus berinovasi untuk memenuhi kebutuhan yang terus berubah di dunia HR digital.</p>
            </div>
            <div class="about-image">
                <!-- Placeholder untuk gambar tentang perusahaan -->
                <div style="background-color: #e0e7ff; height: 400px; display: flex; align-items: center; justify-content: center; color: #4da8ff; font-size: 18px;">
                    Gambar Tim atau Kantor Kami
                </div>
            </div>
        </div>
    </section>
    
    <section class="values">
        <h2 class="section-title">Nilai-Nilai Kami</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🚀</div>
                <h3 class="value-title">Inovasi</h3>
                <p class="value-description">Kami terus mengembangkan solusi terdepan untuk memenuhi kebutuhan HR yang terus berkembang.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Kolaborasi</h3>
                <p class="value-description">Kami bekerja sama dengan klien untuk memahami kebutuhan unik mereka dan memberikan solusi yang tepat.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">💎</div>
                <h3 class="value-title">Integritas</h3>
                <p class="value-description">Kami menjunjung tinggi kejujuran dan transparansi dalam semua aspek bisnis kami.</p>
            </div>
        </div>
    </section>
    
    <section class="team">
        <h2 class="section-title">Tim Leadership</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-photo">👨‍💼</div>
                <div class="member-info">
                    <div class="member-name">Budi Santoso</div>
                    <div class="member-role">CEO & Pendiri</div>
                    <p class="member-bio">Memiliki pengalaman lebih dari 15 tahun di industri HR technology dan software development.</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">👩‍💼</div>
                <div class="member-info">
                    <div class="member-name">Sari Dewi</div>
                    <div class="member-role">Chief Technology Officer</div>
                    <p class="member-bio">Ahli dalam pengembangan sistem enterprise dengan fokus pada solusi HR dan keuangan.</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">👨‍💼</div>
                <div class="member-info">
                    <div class="member-name">Ahmad Rizki</div>
                    <div class="member-role">Head of Product</div>
                    <p class="member-bio">Bertanggung jawab atas pengembangan produk dan experience pengguna di platform HRMS.</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">👩‍💼</div>
                <div class="member-info">
                    <div class="member-name">Maya Sari</div>
                    <div class="member-role">Head of Customer Success</div>
                    <p class="member-bio">Memastikan semua klien mendapatkan nilai maksimal dari solusi HRMS dengan dukungan terbaik.</p>
                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Produk</h3>
                <ul>
                    <li><a href="#">Manajemen Karyawan</a></li>
                    <li><a href="#">Sistem Penggajian</a></li>
                    <li><a href="#">Manajemen Lembur</a></li>
                    <li><a href="#">Golongan Tunjangan</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Perusahaan</h3>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Partner</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Bantuan</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Pusat Bantuan</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Hubungi Kami</h3>
                <ul>
                    <li>Email: info@hrms.com</li>
                    <li>Telepon: (021) 1234-5678</li>
                    <li>Alamat: Jl. HRMS No. 123, Jakarta</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2023 HR Management System. Semua hak dilindungi.
        </div>
    </footer>

    <script>
        // Fungsi untuk logout
        document.querySelector('.logout-btn').addEventListener('click', function() {
            if(confirm('Apakah Anda yakin ingin logout?')) {
                alert('Anda telah logout');
                // Di sini biasanya akan ada redirect ke halaman login
                // window.location.href = 'login.html';
            }
        });
    </script>
</body>
</html>