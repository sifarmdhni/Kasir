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
        }
        
        .content {
    background-color: rgba(245, 171, 98, 0.8);
    border-radius: 10px;
    padding: 2rem;
    margin: 2rem; /* Menambahkan margin di semua sisi */
    box-sizing: border-box; /* Agar padding dan border termasuk dalam ukuran total */
}

        .contact-section {
            background-color: #fff;
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
    transition: transform 0.2s ease, opacity 0.2s ease; /* Transisi untuk transformasi dan opacity */
}

.whatsapp-logo:hover {
    transform: scale(1.1); /* Membesarkan elemen saat kursor berada di atas */
    opacity: 0.9; /* Mengurangi opacity saat kursor berada di atas */
}

.whatsapp-logo.clicked {
    transform: scale(1.2); /* Membesarkan elemen saat diklik */
    opacity: 0.8; /* Mengurangi opacity saat diklik */
}

.whatsapp-logo img {
    width: 100%;
    height: auto;
}



        .footer {
            background-color: #333;
            color: white;
            padding: 2rem 0;
            margin-top: 2rem;
        }
        .kita {
     /* Latar belakang putih dengan transparansi */
    color: #fff; /* Mengubah warna teks menjadi putih */
    border-radius: 10px;
    padding: 1rem; /* Padding untuk ruang di dalam elemen */
    margin: 1rem; /* Margin untuk ruang di luar elemen */
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan */
    transition: transform 0.2s; /* Transisi halus saat hover */
}

.kita:hover {
    transform: scale(1.02); /* Sedikit membesar saat hover */
}

.img-fluid {
    max-width: 100%; /* Agar gambar responsif */
    height: auto; /* Mempertahankan rasio aspek gambar */
}

/* Media query untuk responsivitas */
@media (max-width: 768px) {
    .kita {
        padding: 0.5rem; /* Mengurangi padding pada layar kecil */
    }
}
.text-whitee {
    color: white; /* Pastikan teks berwarna putih */
    margin-top: 30px; /* Atur margin atas untuk menggeser ke bawah */
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
                    <a class="nav-link btn btn-primary" href="/logincustomer">Sign In</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-white">Hello Mr/Mrs.</h1>
                <h3 class="text-white">Welcome...</h3>
                <p class="text-whitee">Welcome! We are very happy to share quality time with you and make memories today! Welcome to our cashier application, here we provide some quality products, please log in for further information.</p>
            </div>
            <div class="col-lg-6">
                <img src="foto/10.png" alt="Floating Image" class="floating img-fluid">
            </div>
        </div>
    </div>

    <div id="about" class="content">
        <h2>Welcome! What's this all about?</h2>
        <p>This is the first project for all of us when we were working at PT Grage Multimedia Teknologi (GMT).</p>
        <p>This is a cashier application which makes it easier to manage a shop that you own.</p>
        <p>This application was created together with the Smkn 1 Talaga street vendor team.</p>
    </div>

    <div class="kita"">
        <h2>Who's behind this?</h2>
        <p>We're a team of creators building on the web full-time. You might have seen our work:</p>
        <img src="/foto/qa.png" alt="Team" class="img-fluid">
    </div>

    <section id="contact" class="contact-section">
        <h2 class="text-center mb-4">Contact</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="contact-item">
                    <h3>Email</h3>
                    <p><a href="mailto:gianadiramdan@gmail.com">gianadiramdan@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-item">
                    <h3>Telepon</h3>
                    <p><a href="https://wa.me/6281297535513">Hubungi Kami di WhatsApp</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-item">
                    <h3>Media Sosial</h3>
                    <p>
                        <a href="#">Facebook</a> |
                        <a href="#">Twitter</a> |
                        <a href="https://www.instagram.com/xiirpltwoo">Instagram</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <a href="https://wa.me/6281297535513" class="whatsapp-logo" target="_blank">
        <img src="/foto/was.png" alt="WhatsApp Logo">
    </a>

    <footer class="footer">
        <div class="container">
            <p class="text-center">Copyright &copy; Designed & Developed By <a href="#">Kasir</a> 2024</p>
            <ul class="list-inline text-center">
                <li class="list-inline-item"><a href="#about">Tentang Kami</a></li>
                <li class="list-inline-item"><a href="#contact">Kontak</a></li>
            </ul>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>