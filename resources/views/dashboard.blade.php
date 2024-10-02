<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi Kasir</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/kasir5.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('aw.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
        }
        .floating {
            animation: float 3s ease-in-out infinite;
            max-width: 100%;
            height: auto;
        }
        @keyframes float {
            0% { transform: translatey(0px); }
            50% { transform: translatey(-20px); }
            100% { transform: translatey(0px); }
        }
        .nav-link {
            color: white !important;
            font-weight: bold;
        }
        
        .content {
    background-color: rgba(245, 171, 98, 0.8);
    border-radius: 10px;
    padding: 2rem;
    margin: 2rem; 
    box-sizing: border-box; 
}

        .contact-section {
            background-color: #ffffff01;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .contact-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .whatsapp-logo {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 40px;
    z-index: 1000;
    transition: transform 0.2s ease, opacity 0.2s ease; 
}

.whatsapp-logo:hover {
    transform: scale(1.1); 
    opacity: 0.9; 
}

.whatsapp-logo.clicked {
    transform: scale(1.2); 
    opacity: 0.8; 
}

.whatsapp-logo img {
    width: 100%;
    height: auto;
}



        .footer {
            background-color: grey;
            color: white;
            padding: 2rem 0;
            margin-top: 2rem;
        }

 .kita {
     
    color: #fff; 
    border-radius: 10px;
    padding: 4rem; 
    margin: 4rem; 
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); 
    transition: transform 0.2s; 
}

.kita:hover {
    transform: scale(1.09); 
}

.img-fluid {
    max-width: 100%;
    height: auto; 
}

/* Media query untuk responsivitas */
@media (max-width: 768px) {
    .kita {
        padding: 0.5rem; 
    }
}
.text-whitee {
    color: white; 
    margin-top: 30px; 
}
.text-whit6e {
    color: white; /* Mengatur warna teks menjadi putih */
    font-weight: bold; /* Mengatur teks menjadi tebal */
}
h3 {
    color: white; /* Mengatur warna teks menjadi putih */
}
h2 {
    color: white; /* Mengatur warna teks menjadi putih */
}

.navbar-nav {
    display: inline-flex;
    margin-right: 100px;
    margin-top: 30px; /* Mengatur item navbar dalam satu baris */
}

.nav-item {
    margin-right: 9px;
    top: 10px; /* Jarak antar item navbar */
}
.navbar-brand {
    display: inline-block; /* Memungkinkan untuk mengatur lebar dan tinggi */
    overflow-x: auto; /* Membuat elemen dapat digulir secara horizontal */
    white-space: nowrap; /* Mencegah konten membungkus ke baris berikutnya */
    max-width: 100%;
    margin-left: 30px;
    margin-top: 30px; /* Batasi lebar maksimum */
}

.navbar-brand img {
    max-width: none; /* Menghindari pemotongan gambar */
    height: auto; /* Menjaga aspek rasio gambar */
}
.content {
    padding: 20px;
}

.product-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Menentukan ukuran kolom */
    gap: 20px; /* Jarak antar produk */
}

.product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.product-card img {
    max-width: 100%;
    border-radius: 5px;
}

.product-card h4 {
    margin: 10px 0 5px;
}

.product-card p {
    margin: 5px 0;
}

.product-card:hover {
    transform: scale(1.05); /* Efek zoom saat hover */
}
.h3p{
    text-align: center;
    font-weight: bold;
}
.product-section {
        background-color: white;
        padding: 20px;
        border-radius: 0px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 1500px;
        margin: 0 auto;
    }

    .h3p {
        color: black;
        text-align: center;
        margin-bottom: 20px;
    }

    .product-gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .product-card {
        background-color: white;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        width: 165px;
        text-align: center;
        transition: transform 0.5s ease;
    }
    .footer {
        background-color: #333;
        color: white;
        padding: 40px 0 20px;
    }

    .footer .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer2, .footer3, .footer4 {
        flex: 1;
        min-width: 200px;
        margin-bottom: 20px;
        padding: 0 15px;
    }

    .footer img {
        margin-bottom: 15px;
    }

    .footer h4 {
        font-weight: bold;
        margin-bottom: 15px;
    }

    .footer h6 {
        margin-bottom: 5px;
    }

    .footer a {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer a:hover {
        color: #ddd;
    }

    .footer p {
        margin-bottom: 10px;
    }

    .social-links a {
        margin-right: 10px;
    }

    .text-center {
        width: 100%;
        text-align: center;
        padding-top: 20px;
        margin-top: 20px;
        border-top: 1px solid #555;
    }

    @media (max-width: 768px) {
        .footer .container {
            flex-direction: column;
        }

        .footer2, .footer3, .footer4 {
            width: 100%;
            margin-bottom: 30px;
        }
    }



    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .product-card h4 {
        margin: 10px 0;
    }

    .product-card p {
        margin: 5px 0;
    }

    @media (max-width: 768px) {
        .product-card {
            width: calc(50% - 20px);
        }
    }

    @media (max-width: 480px) {
        .product-card {
            width: 100%;
        }
    }
    .abouth1 {
        font-weight: bold; /* Atau bisa menggunakan '700' */
    }

.footerlogo {
    display: block; /* Pastikan logo ditampilkan sebagai blok */
}
.footer3 {
    display: flex;
    flex-direction: column; /* Mengatur elemen menjadi kolom */
    align-items: flex-start; /* Mengatur item di kiri */
    padding: 15px; /* Tambahkan padding sesuai kebutuhan */
    background-color: #0; /* Contoh warna latar belakang */
    color: white; /* Warna teks */
    border-radius: 8px; /* Radius border jika diinginkan */
    transition: transform 0.3s ease;
    margin: 10px; /* Tambahkan margin untuk spasi */
}

.footer4 {
    display: flex;
    flex-direction: column; /* Mengatur elemen menjadi kolom */
    align-items: flex-start; /* Mengatur item di kiri */
    padding: 15px; /* Tambahkan padding sesuai kebutuhan */
    background-color: #0; /* Contoh warna latar belakang */
    color: white; /* Warna teks */
    border-radius: 8px; /* Radius border jika diinginkan */
    transition: transform 0.3s ease;
    margin: 10px; /* Tambahkan margin untuk spasi */
}

.tentangkami {
        background-color: 0;
        padding: 20px;
        border-radius: 0px;
        max-width: 1500px;
        margin: 0 auto;
    }









    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/">
            <img src="foto/kasic.png" alt="Logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#produk">PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="/logincustomer">Sign In</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-whit6e">Hallo.</h1>
                <h3 class="text-whit6e">Terima Kasih telah bergabung...</h3>
                <p class="text-whitee"> Kami sangat senang Anda bergabung dengan kami hari ini. Nikmati pengalaman Anda dan jangan ragu untuk menjelajahi semua yang kami tawarkan!.</p>
            </div>
            <div class="col-lg-6">
                <img src="foto/10.png" alt="Floating Image" class="floating img-fluid">
            </div>
        </div>
    </div>

       
<div class="product-section" id="produk">
    <h3 class="h3p">Daftar Produk</h3>
    <div class="product-gallery">
        @foreach($data_produk as $produk)
            <div class="product-card">
                <img src="{{ asset('foto/fotoproduk/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}">
                <h4>{{ $produk->nama_produk }}</h4>
                <p>Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p>Stok: {{ $produk->stok }}</p>
            </div>
        @endforeach
</div>
</div>
   <div class="tentangkami">
    <div id="about" class="content">
        <h1 class="abouth1">Kemari! Tentang apa ini?</h1>
        <p>-Ini adalah proyek pertama bagi kami semua ketika kami bekerja di PT Grage Multimedia Teknologi (GMT).</p>
        <p>-Ini adalah aplikasi kasir yang memudahkan untuk mengelola toko yang Anda miliki.</p>
        <p>-Aplikasi ini dibuat bersama dengan tim PKL Smkn 1 Talaga.</p>
    </div>
    </div>
    <div class="kita">
        <h1 class="abouth1">Siapa di balik ini?</h1>
        <p>Kami adalah tim kreator yang membangun di web secara penuh waktu. Anda mungkin telah melihat karya kami:</p>
        <img src="/foto/qa.png" alt="Team" class="img-fluid">
    </div>

    <a href="https://wa.me/6281297535513" class="whatsapp-logo" target="_blank">
        <img src="/foto/was.png" alt="WhatsApp Logo">
    </a>

    <footer class="footer">
        <div class="container">
        <div class="footer2">
                <img src="foto/kasic.png" alt="Logo" width="150">
                <h4>PT Aplikasi Kasir</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.995388605032!2d108.45887257403326!3d-6.770413866206069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1f698feaec99%3A0x909eee85e942ce8a!2sKampoeng%20IT%20(%20JAGAT%20)!5e0!3m2!1sen!2sid!4v1725246783538!5m2!1sen!2sid" size="50px;" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <p>6FH6+RHP, Sidawangi, Sumber, Cirebon, West Java 45611</p>
                <p></p>
        </div>
        <div class="footer3">
                <h4 style=" font-weight: bold;">MENU</h4>
                <h6><a href="#about" style="color: white;">About</a></h6>
                <h6><a href="#contact" style="color: white;">Contac</a></h6>
                <h6><a href="#produk" style="color: white;">Produk</a></h6>
            </div>
            <div class="footer4">
                <h4 style=" font-weight: bold;" id="contact">Contac Us</h4>
                <h6 style="color: white;">Email</a></h6>
                <p><a href="mailto:gianadiramdan@gmail.com" style="color: #6495ED;">gianadiramdan@gmail.com</a></p>
                <h6 style="color: white;">Telepon</a></h6>
                <p><a href="https://wa.me/6281297535513"  style="color: #6495ED;">Hubungi Kami di WhatsApp</a></p>

                <h6 style="color: white;">Media Sosial</a></h6>
                <p  style="color: #6495ED;">
                        <a href="#"  style="color: #6495ED;">Facebook</a> |
                        <a href="#"  style="color: #6495ED;">Twitter</a> |
                        <a href="https://www.instagram.com/xiirpltwoo"  style="color: #6495ED;">Instagram</a>
                    </p>
            </div>
         <p class="text-center">Copyright &copy; Designed & Developed By <a href="#">Kasir</a> 2024</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>